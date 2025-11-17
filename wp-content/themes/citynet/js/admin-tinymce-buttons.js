(function() {
    tinymce.PluginManager.add('citynet_admin_tinymce_buttons', function(editor, url) {
        var imagesFolder = url.replace(new RegExp('js$'), 'images');

        editor.addButton('cn_aparat_video', {
            title: 'اضافه کردن ویدیو از آپارات',
            image: imagesFolder + '/aparat.svg',
            onclick: function() {
                editor.windowManager.open({
                    title: 'اضافه کردن ویدیو از آپارات',
                    body: [
                        {
                            type: 'textbox',
                            name: 'txtAparatVideoUid',
                            label: 'شناسه ویدیو',
                        },
                        {
                            type: 'listbox',
                            name: 'lstAparatVideoQuality',
                            label: 'کیفیت پیش فرض',
                            'values': [
                                {text: 'بالا', value: 'high'},
                                {text: 'متوسط', value: 'medium'},
                                {text: 'پایین', value: 'low'}
                            ],
                            value: 'medium'
                        }
                    ],
                    onsubmit: function(e) {
                        if (e.data.txtAparatVideoUid) {
                            editor.insertContent('[cn-aparat-video uid="' + e.data.txtAparatVideoUid + '" quality="' + e.data.lstAparatVideoQuality + '"]');
                        }
                    }
                });
            }
        });

        editor.addButton('cn_site_tel', {
            title: 'شماره تلفن سایت',
            image: imagesFolder + '/phone.svg',
            onclick: function() {
                var btnShortcode = '[cn-site-tel]';
                editor.insertContent(btnShortcode);
            }
        });

        editor.addButton('cn_site_mobile', {
            title: 'شماره موبایل سایت',
            image: imagesFolder + '/mobile.svg',
            onclick: function() {
                var btnShortcode = '[cn-site-mobile]';
                editor.insertContent(btnShortcode);
            }
        });

        editor.addButton('cn_site_email', {
            title: 'نمایش ایمیل سایت',
            image: imagesFolder + '/email.svg',
            onclick: function() {
                editor.windowManager.open({
                    title: 'نمایش ایمیل سایت',
                    body: [
                        {
                            type: 'listbox',
                            name: 'lstEmailHasCta',
                            label: 'لینک شونده',
                            'values': [
                                {text: 'بله', value: 'yes'},
                                {text: 'خیر', value: 'no'}
                            ],
                            value: 'yes'
                        }
                    ],
                    onsubmit: function(e) {
                        editor.insertContent('[cn-site-email cta="' + e.data.lstEmailHasCta + '"]');
                    }
                });
            }
        });
    });
})();