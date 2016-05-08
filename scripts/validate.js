$(document).ready(function () {

    $('#register').validate({ // initialize the plugin
        rules: {
            fornafn: {
                required: true,
                minlength: 2
            },

            eftirnafn: {
                required: true,
                minlength: 2
            },

            simi: {
                number: true,
                minlength: 7
            },

            email: {
                required: true,
                email: true
            },

            lykilord: {
            required: true,
            },

            lykilordMatch: {
            required: true,
            equalTo: "#lykilord"
            },

            svarSpurning: {
                required: true,
                minlength: 2
            }
        } // ENDIR Á RULES
        }); // ENDIR Á REGISTER

        $('#login').validate({ // initialize the plugin
            rules: {
                notendanafn: {
                    email: true,
                    required: true
                },
                lykilord: {
                    required: true
                }
        } // ENDIR Á RULES
        }); // ENDIR Á LOGIN

      });