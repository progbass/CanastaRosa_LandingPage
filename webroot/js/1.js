(function e(t, n, r) {
    function s(o, u) {
        if (!n[o]) {
            if (!t[o]) {
                var a = typeof require == "function" && require;
                if (!u && a)
                    return a(o, !0);
                if (i)
                    return i(o, !0);
                var f = new Error("Cannot find module '" + o + "'");
                throw f.code = "MODULE_NOT_FOUND", f
            }
            var l = n[o] = {exports: {}};
            t[o][0].call(l.exports, function (e) {
                var n = t[o][1][e];
                return s(n ? n : e)
            }, l, l.exports, e, t, n, r)
        }
        return n[o].exports
    }
    var i = typeof require == "function" && require;
    for (var o = 0; o < r.length; o++)
        s(r[o]);
    return s
})({1: [function (require, module, exports) {
            'use strict';

// MODAL FORM 
            var ModalWindow = function ModalWindow(_target) {
                var closeTimer = 0;
                var modal_fragment = document.createDocumentFragment();
                var modal_container = document.createElement('div');

                var background = document.createElement('div');
                background.className = 'background';

                var targetContent = document.querySelector(_target);
                targetContent.classList.add('modalContent');
                var content = targetContent.parentNode.removeChild(targetContent);

                modal_fragment.appendChild(background);
                modal_fragment.appendChild(content);
                modal_container.appendChild(modal_fragment);
                modal_container.classList.add('modalWindow');

                modal_container.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (e.target.className === 'background') {
                        closeWindow();
                    }
                });

                var closeWindow = function closeWindow() {
                    modal_container.classList.remove('active');
                    console.log(modal_container.classList);

                    clearInterval(closeTimer);
                    closeTimer = setTimeout(function () {
                        document.body.removeChild(modal_container);
                    }, 2000);

                    document.querySelector('#main_container').style.position = 'relative';
                };
                var openWindow = function openWindow() {
                    clearInterval(closeTimer);

                    modal_container.classList.add('active');
                    document.querySelector('#main_container').style.position = 'fixed';
                    document.body.appendChild(modal_container);
                };

                return {
                    openWindow: openWindow,
                    closeWindow: closeWindow
                };
            };

            module.exports = ModalWindow;

        }, {}], 2: [function (require, module, exports) {
            "use strict";

            var ModalWindow = require('./ModalWindow');

// Ajax Object
            window.AJAXObject = function (_url, _query, _callback) {
                var xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        _callback(xmlhttp.responseText);
                    }

                    //alert(xmlhttp.readyState);
                };

                xmlhttp.open("POST", _url, true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(_query);
            };

// REGISTER FORM
            window.RegisterForm = function () {
                // var name;
                var email;
                var register_page = 0;
                var register_container = document.querySelector("#registerForm");
                var register_sliderContainer = register_container.querySelector(".slider_container");
                var register_slider = register_sliderContainer.querySelector('.slider');
                var register_form = document.querySelector("#register_form");

                var register_submit = register_form.querySelector('input[type=submit]');
                var register_nav = register_container.querySelector('a.nav');

                var register_stepsContainer = register_container.querySelector('.register_step');
                var register_fields = [register_form.querySelector('input[name=name_txt]'), register_form.querySelector('input[name=email_txt]'), register_form.querySelector('input[name=zip_txt]'), register_form.querySelector('input[name=phone_txt]')];
                var cat = [];
                var categoriesHolder = register_container.querySelector('.category_list');
                var categories = [].slice.call(register_container.querySelectorAll('input[type=checkbox]'));
                categories.forEach(function (option) {

                    if (option.value != "") {
                        var category = document.createElement('li');
                        category.innerHTML = option.parentNode.textContent;
                        category.setAttribute('data-category', option.value);

                        category.addEventListener('click', function () {
                            this.classList.toggle('active');

                            var selectedCategories = [];
                            var catList = [].slice.call(categoriesHolder.querySelectorAll('li'));
                            for (var i = 0; i < catList.length; i++) {

                                if (catList[i].classList.contains('active')) {
                                    if (categories[i].value === catList[i].getAttribute('data-category')) {
                                        cat.push(categories[i].value);
                                        categories[i].checked = true;
                                        selectedCategories.push(categories[i]);
                                    }
                                } else {
                                    categories[i].checked = false;
                                }
                            }
                            ;

                            if (!selectedCategories.length) {
                                register_nav.style.visibility = 'hidden';
                            } else {
                                register_nav.style.visibility = 'visible';
                            }
                        });

                        categoriesHolder.appendChild(category);
                    }
                });

                register_nav.style.visibility = 'hidden';
                register_nav.addEventListener('click', function (e) { 
                    console.log(cat);
                    e.preventDefault();
                    register_page = 1;
                    this.style.display = 'block';
                    register_submit.style.display = 'block';
                    validateForm();
                    moveSlider();
                        var name = document.querySelector("#inputName").value;
                        var email = document.querySelector("#inputEmail").value;
                        var code = document.querySelector("#inputCode").value;
                        var phone = document.querySelector("#inputPhone").value;                      
                            $.post("/canastaroca/users/reg", {"name": name, "email": email, "postal_code": code, "mobile": phone,"category":cat[0]}, function (d) {
                                console.log(d);
                            });

                });


                register_fields.forEach(function (_element) {

                    _element.addEventListener('blur', function () {
                        validateForm();
                    });
                });
                register_submit.add
                var moveSlider = function moveSlider() {
                    // Select Container
                    var bullets = register_stepsContainer.querySelectorAll('span');
                    bullets.forEach(function (element, index) {
                        element.classList.toggle('active', false);

                        if (index == register_page) {
                            element.classList.toggle('active', true);
                        }
                    });

                    // Move Slider
                    register_slider.style.left = -register_slider.parentNode.offsetWidth * register_page + 'px';
                };

                var validateForm = function validateForm() {
                    register_submit.style.visibility = 'hidden';
                    var isValid = false;

                    for (var i = 0; i < register_fields.length; i++) {
                        var regex = void 0;
                        switch (register_fields[i].getAttribute('name')) {
                            case 'name_txt':
                                regex = /^[a-zA-Z ]{2,30}$/;
                                isValid = regex.test(register_fields[i].value);

                                break;
                            case 'email_txt':
                                regex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
                                isValid = regex.test(register_fields[i].value);

                                break;
                            case 'zip_txt':
                                regex = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
                                isValid = regex.test(register_fields[i].value);

                                break;
                            case 'phone_txt':
                                //regex = /^([1-9]\d{1}-\d{4}-\d{4}|[1-9]\d{2}-\d{3}-\d{4})$/;
                                //isValid = (regex.test(register_fields[i].value));
                                break;
                        }

                        if (!isValid)
                            break;
                    }
                    ;

                    if (isValid) {
                        register_submit.style.visibility = 'visible';
                        return true;
                    }

                    return false;
                };

                var submit = function submit() {
                    // Validate Form first
                    if (!validateForm()) {
                        return false;
                    }

                    // Form Query
                    var query = '?';

                    // Input Fields
                    register_fields.forEach(function (_element) {
                        try {
                            query += _element.getAttribute('name') + '=' + _element.value + '&';
                            console.log(query);
                        } catch (e) {
                        }
                    });

                    // Categories List
                    var checkboxes = document.getElementsByName('category_sct[]');
                    var vals = "";
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked) {
                            vals += "," + checkboxes[i].value;
                        }
                    }
                    if (vals)
                        vals = vals.substring(1);
                    query += "category_sct=" + vals;

                    ///
                    AJAXObject(register_form.getAttribute('action'), query);
                    return false;
                };

                var formSuccess = function formSuccess(_response) {
                    alert(_response); // Here is the response
                };

                validateForm();
                return {
                    'submit': submit
                };
            }();

// REGISTER FORM
            window.InviteForm = function () {

                var invite_container = document.querySelector("#mailForm");
                var invite_form = document.querySelector("#invite_form");
                var invite_submit = invite_form.querySelector('input[type=submit]');
                var invite_fields = [invite_form.querySelector('input[name=email_txt]'), invite_form.querySelector('textarea[name=message_txt]')];

                var validateForm = function validateForm() {
                    var query = '?';
                    invite_fields.forEach(function (_element) {
                        try {
                            query += _element.getAttribute('name') + '=' + _element.value + '&';
                        } catch (e) {
                        }
                    });
                    alert(query);
                    AJAXObject(invite_form.getAttribute('action'), query);

                    return false;
                };

                var formSuccess = function formSuccess(_response) {
                    alert(_response); // Here is the response
                };

                return {
                    'submit': validateForm
                };
            }();

            window.SocialShare = function (_network, _url, _title) {

                var url = _url,
                        apiEndpoint = "";
                switch (_network) {
                    case "facebook":
                        apiEndpoint = "https://www.facebook.com/sharer/sharer.php?u=" + url;
                        break;

                    case "twitter":
                        var title = encodeURIComponent(_title);
                        apiEndpoint = "https://twitter.com/intent/tweet?text=" + title + "&url=" + url;
                }
                var f = 500,
                        g = 250,
                        h = screen.width / 2 - f / 2,
                        i = screen.height / 2 - g / 2;
                var myWindow = window.open(apiEndpoint, "win_share", "width=" + f + ",height=" + g + ", top=" + i + ", left=" + h);
            };

            window.SocialShare2 = function (_network, _url, _title) {}(function () {
                // Extend Image Prototype Functionality
                Image.prototype.resize = function () {
                    var container = this.parentNode;
                    var containerRatio = container.offsetWidth / container.offsetHeight;
                    var imageRatio = this.offsetWidth / this.offsetHeight;
                    if (containerRatio > imageRatio) {
                        this.classList.remove('vertical');
                        this.classList.add('horizontal');
                    } else {
                        this.classList.remove('horizontal');
                        this.classList.add('vertical');
                    }
                };

                //
                var galleryImages = [].slice.call(document.querySelectorAll('#gallery li'));
                galleryImages.forEach(function (_target) {
                    var image = _target.querySelector('img');
                    image.onload = image.resize;
                    image.src = image.src;
                });

                //
                window.addEventListener('resize', function () {
                    galleryImages.forEach(function (_target) {
                        var image = _target.querySelector('img');
                        image.resize();
                    });
                });

                //
                window.registerWindow = new ModalWindow("#registerForm");
                window.shareWindow = new ModalWindow("#mailForm");
            }());

        }, {"./ModalWindow": 1}]}, {}, [2]);
