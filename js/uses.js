"use strict";
// Class definition

var KTDatatableAutoColumnHideDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {

        var datatable = $('.kt-datatable').DataTable({
            // datasource definition
            data: {
                // saveState: {cookie: false, webstorage: false,},
                type: 'remote',
                source: {
                    read: {
                        url:'../ajax/form_ajax.php',
                        method: 'POST',
                        params: {
                            action: 'list',
                        },
                    },

                },


            },

            /*  webstorage: false,
              cookie: false,*/
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,
            pagination: true,

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [
                // {
                //     field: 'id',
                //     title: 'ID',

                // },
                {
                    field: 'fname',
                    title: 'First Name',
                    // template: function (row) {
                    //     return row.elements_master_size + " " + row.elements_master_size_unit;

                    },
                
                {
                    field: 'lname',
                    title: 'Last Name',
                    // template: function (row) {
                    //     return row.elements_master_calories + " " + row.elements_master_calories_unit;

                    // },
                },
                {
                    field: 'email',
                    title: 'Email',
                    // template: function (row) {
                    //     return row.elements_master_fat + " " + row.elements_master_fat_unit;

                    // },
                },
                {
                    field: 'phone',
                    title: 'Contact',
                    // template: function (row) {
                    //     return row.elements_master_protien + " " + row.elements_master_protien_unit;

                    // },
                },
                {
                    field: 'password',
                    title: 'Password',
                    // template: function (row) {
                    //     return row.elements_master_carbohydrate + " " + row.elements_master_carbohydrate_unit;

                    // },
                },
                {
                    field: 'id',
                    title: 'Action',
                    overflow: 'visible',
                    autoHide: false,
                    textAlign: 'center',
                    template: function (row) {
                        return '<Button id="' + row.id + '" title="Edit user" href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect></g></svg></span></a>';
                    },
                },
            ],

        });

        datatable.on('click', '[id]', function () {

            var id = $(this).data('id');

            window.open('main/user_edit.php?id=' + id, "_blank");

        });
    };

    return {
        // public functions
        init: function () {
            demo();
        },
    };
}();

jQuery(document).ready(function () {
    KTDatatableAutoColumnHideDemo.init();

});

