"use strict";

//  init Fancybox
if (typeof Fancybox !== "undefined" && Fancybox !== null) {
    Fancybox.bind("[data-fancybox]", {
        dragToClose: false,
        closeButton: false
    });
}

$(function () {

    // detect user OS
    const isMobile = {
        Android: () => /Android/i.test(navigator.userAgent),
        BlackBerry: () => /BlackBerry/i.test(navigator.userAgent),
        iOS: () => /iPhone|iPad|iPod/i.test(navigator.userAgent),
        Opera: () => /Opera Mini/i.test(navigator.userAgent),
        Windows: () => /IEMobile/i.test(navigator.userAgent),
        any: function () {
            return this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows();
        },
    };

    function getNavigator() {
        if (isMobile.any() || $(window).width() < 992) {
            $('body').removeClass('_pc').addClass('_touch');
        } else {
            $('body').removeClass('_touch').addClass('_pc');
        }
    }

    getNavigator();

    $(window).on('resize', () => {
        getNavigator();
    });




    // event handlers
    $(document).on('click', (e) => {
        const $target = $(e.target);



        //  menu
        if ($target.closest('.menu__btn').length) {
            $('.header').toggleClass('open-menu');
        }

        if ($target.is('.wrapper') && $('.header').hasClass('open-menu')) {
            $('.header').removeClass('open-menu');
        }

        if ($target.closest('.faq__item').length) {
            const $faqItem = $target.closest('.faq__item');
            $faqItem.toggleClass('active');
            $faqItem.find('.faq__item-answer').slideToggle()
        }

    });




    //  sliders


    // observer header scroll
    const callback = (entries) => {
        if (entries[0].isIntersecting) {
            $('.header').removeClass('scroll');
        } else {
            $('.header').addClass('scroll');
        }
    };

    const headerObserver = new IntersectionObserver(callback);
    headerObserver.observe($('.header')[0]);


    // observer header height
    function updateHeaderHeight() {
        var headerHeight = $('.header__wrapper').outerHeight() / parseFloat($('html').css('font-size'));

        $('body').css('--header-height', headerHeight + 'rem');
    }

    updateHeaderHeight();

    $(window).on('resize', function () {
        updateHeaderHeight();
    });





    // tabs
    // class Tabs {
    //     constructor(wrapper) {
    //         this.$wrapper = $(wrapper);
    //         this.$tabButtons = this.$wrapper.find('.tabs__item');
    //         this.$tabContents = this.$wrapper.find('.tab-content');
    //         this.init();
    //     }

    //     init() {
    //         this.$tabButtons.each((index, button) => {
    //             $(button).on('click', () => this.activateTab(index));
    //         });
    //     }

    //     activateTab(index) {
    //         this.$tabButtons.removeClass('active');
    //         this.$tabContents.removeClass('active');

    //         this.$tabButtons.eq(index).addClass('active');
    //         this.$tabContents.eq(index).addClass('active');
    //     }
    // }

    // $('.tabs-wrapper').each((_, wrapper) => new Tabs(wrapper));



    // Custom Select

    class CustomSelect {

        static openDropdown = null

        constructor(selectElement) {
            this.$select = $(selectElement);
            this.defaultText = this.$select.find('option:selected').text();
            this.selectName = this.$select.attr('name');
            this.$options = this.$select.find('option');
            this.icon = this.$select.data('icon');
            this.title = this.$select.data('title');
            this.$dropdown = null;
            this.initialState = {};
            this.init();
        }

        init() {
            if (!this.$select.length) return;
            this.saveInitialState();
            this.$select.addClass('hidden');
            this.renderDropdown();
            this.setupEvents();
        }

        saveInitialState() {
            const $selectedOption = this.$select.find('option:selected');
            this.initialState = {
                selectedText: $selectedOption.text(),
                selectedValue: $selectedOption.val(),
            };
        }

        renderDropdown() {
            const isDisabled = this.$select.is(':disabled')

            let buttonTemplate = '';

            if (this.icon) {
                buttonTemplate = `
                    <button type="button" class="dropdown__button icon-chevron" 
                        aria-expanded="false" 
                        aria-haspopup="true" 
                        ${isDisabled ? 'disabled' : ''}>
                        <span class="dropdown__button-icon ${this.icon}"></span>
                        <span class="dropdown__button-text">${this.defaultText}</span>
                    </button>
                `;
            } else if (this.title) {

                buttonTemplate = `
                    <button type="button" class="dropdown__button icon-chevron" 
                        aria-expanded="false" 
                        aria-haspopup="true" 
                        ${isDisabled ? 'disabled' : ''}>
                        <span class="dropdown__button-column">
                            <span class="dropdown__button-caption">${this.title}</span>
                            <span class="dropdown__button-text">${this.defaultText}</span>
                        </span>
                    </button>
                `;
            } else {
                buttonTemplate = `
                    <button type="button" class="dropdown__button icon-chevron" 
                        aria-expanded="false" 
                        aria-haspopup="true" 
                        ${isDisabled ? 'disabled' : ''}>
                        <span class="dropdown__button-text">${this.defaultText}</span>
                    </button>
                `;
            }

            this.$dropdown = $(`
                <div class="dropdown">
                    ${buttonTemplate}
                    <div class="dropdown__body" aria-hidden="true">
                        <ul class="dropdown__list" role="listbox"></ul>
                    </div>
                </div>
            `);

            const $list = this.$dropdown.find('.dropdown__list');
            this.$options.each((index, option) => {
                const $option = $(option);
                const value = $option.attr('value');
                const text = $option.text();
                const isSelected = $option.is(':selected');
                const isDisabled = $option.is(':disabled');

                $list.append(`
                    <li role="option"
                        data-value="${value}"
                        aria-checked="${isSelected}"
                        class="dropdown__list-item${isSelected ? ' selected' : ''}${isDisabled ? ' disabled' : ''}" 
                        ${isDisabled ? 'aria-disabled="true"' : ''}>
                        ${text}
                    </li>
                `);
            });

            this.$select.after(this.$dropdown);


        }

        setupEvents() {
            this.$dropdown.find('.dropdown__button').on('click', (event) => {
                event.stopPropagation();
                const isOpen = this.$dropdown.hasClass('visible');
                this.toggleDropdown(!isOpen);
            });

            this.$dropdown.find('.dropdown__list-item').on('click', (event) => {
                event.stopPropagation();
                const $item = $(event.currentTarget);

                if (!$item.hasClass('disabled')) {
                    this.selectOption($item);
                }
            });

            $(document).on('click', () => this.closeDropdown());
            $(document).on('keydown', (event) => {
                if (event.key === 'Escape') this.closeDropdown();
            });

            this.$select.closest('form').on('reset', () => this.restoreInitialState());

            const observerDisabled = new MutationObserver(() => {
                const isSelectDisabled = this.$select.is(':disabled');
                const $button = this.$dropdown.find('.dropdown__button');

                if (isSelectDisabled) {
                    $button.prop('disabled', true);
                } else {
                    $button.prop('disabled', false);
                }
            });

            observerDisabled.observe(this.$select[0], {
                attributes: true,
                attributeFilter: ['disabled']
            });

            const observerSelected = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'disabled') {
                        const $option = $(mutation.target);
                        const value = $option.attr('value');
                        const isDisabled = $option.is(':disabled');
                        const $item = this.$dropdown.find(`.dropdown__list-item[data-value="${value}"]`);

                        $item.toggleClass('disabled', isDisabled);
                        if (isDisabled) {
                            $item.attr('aria-disabled', 'true');
                        } else {
                            $item.removeAttr('aria-disabled');
                        }
                    }

                    if (mutation.type === 'attributes' && mutation.attributeName === 'selected') {
                        this.syncSelectedOption();
                    }
                });
            });

            observerSelected.observe(this.$select[0], {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['selected', 'disabled']
            });
        }

        toggleDropdown(isOpen) {
            if (isOpen && CustomSelect.openDropdown && CustomSelect.openDropdown !== this) {
                CustomSelect.openDropdown.closeDropdown();
            }

            const $body = this.$dropdown.find('.dropdown__body');
            const $list = this.$dropdown.find('.dropdown__list');
            const hasScroll = $list[0].scrollHeight > $list[0].clientHeight;

            this.$dropdown.toggleClass('visible', isOpen);
            this.$dropdown.find('.dropdown__button').attr('aria-expanded', isOpen);
            $body.attr('aria-hidden', !isOpen);

            if (isOpen) {
                CustomSelect.openDropdown = this;
                this.$dropdown.removeClass('dropdown-top');
                const dropdownRect = $body[0].getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                if (dropdownRect.bottom > viewportHeight) {
                    this.$dropdown.addClass('dropdown-top');
                }

                $list.toggleClass('has-scroll', hasScroll);
            } else {
                if (CustomSelect.openDropdown === this) {
                    CustomSelect.openDropdown = null;
                }
            }
        }

        closeDropdown() {
            this.toggleDropdown(false);
        }

        selectOption($item) {
            const value = $item.data('value');
            const text = $item.text();

            this.$dropdown.find('.dropdown__list-item').removeClass('selected').attr('aria-checked', 'false');
            $item.addClass('selected').attr('aria-checked', 'true');

            this.$dropdown.find('.dropdown__button-text').text(text);
            this.$select.val(value).trigger('change');
            this.closeDropdown();
        }

        restoreInitialState() {
            const state = this.initialState;
            this.$select.val(state.selectedValue).trigger('change');
            this.$dropdown.find('.dropdown__list-item').removeClass('selected').attr('aria-checked', 'false');
            this.$dropdown
                .find(`.dropdown__list-item[data-value="${state.selectedValue}"]`)
                .addClass('selected')
                .attr('aria-checked', 'true');
            this.$dropdown.find('.dropdown__button-text').text(state.selectedText);
        }

        syncSelectedOption() {
            const $selectedOption = this.$select.find('option:selected');
            const selectedValue = $selectedOption.val();
            const selectedText = $selectedOption.text();


            this.$dropdown.find('.dropdown__list-item').removeClass('selected').attr('aria-checked', 'false');
            this.$dropdown
                .find(`.dropdown__list-item[data-value="${selectedValue}"]`)
                .addClass('selected')
                .attr('aria-checked', 'true');
            this.$dropdown.find('.dropdown__button-text').text(selectedText);
        }
    }

    $('.select').each((index, element) => {
        new CustomSelect(element);
    });


    // international phone input
    if ($('.phone-input').length > 0) {
        $('.phone-input').each(function (idx, input) {

            let inputInt = intlTelInput(input, {
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
                initialCountry: "ru",
                separateDialCode: true,
            });

            let pattern = getPattern();


            input.addEventListener("countrychange", function () {
                pattern = getPattern();
                $(input).formatter().resetPattern(pattern);
            });

            $(input).formatter({
                'pattern': pattern
            });

            function getPattern() {
                let pattern;
                if (inputInt.j == 'ru') {
                    pattern = '({{999}}) {{999}}-{{99}}-{{99}}';
                } else {
                    pattern = '{{9999999999999999999999}}';
                }

                return pattern;
            }
        });
    }


})




