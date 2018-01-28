var PASSWORD_MINLENGTH = 6;
window.client_sign_up_rules = {
    email: {
        email: true
    },
    password: {
        minlength: PASSWORD_MINLENGTH
    },
    confirm_password: {
        minlength: PASSWORD_MINLENGTH,
        equalTo: '#password'
    }
};

function _pro_required_fields_rules(){
    return {
        required: function(){
            return $('.role_type').val() == 'professional';
        }
    }
}

window.sign_up_rules = window.pro_sign_up_rules = {
    email: {
        email: true
    },
    password: {
        minlength: PASSWORD_MINLENGTH
    },
    confirm_password: {
        minlength: PASSWORD_MINLENGTH,
        equalTo: '#password'
    },
    confirm_email: {
        equalTo: '#email'
    },
    category: _pro_required_fields_rules(),
    'countries_served[]': _pro_required_fields_rules(),
    contact_number: _pro_required_fields_rules(),
    location: _pro_required_fields_rules(),
    willing_distance_to_travel: _pro_required_fields_rules(),
};

window.contact_us_rules = {
    email: {
        email: true
    }
};

window.create_event_rules = {
    email: {
        email: true
    }
};

window.forgot_password_rules = {
    email: {
        required: true,
        email: true
    },
    password: {
        required: true,
        minlength: PASSWORD_MINLENGTH
    },
    password_confirmation: {
        required: true,
        minlength: PASSWORD_MINLENGTH,
        equalTo: '#password'
    }
};

window.newsletter_subscribe = {
    'nl-email':{
        required: true,
        email: true
    }
};

// Professional Account

window.professionals_update_notification_settings = {
    'notification_settings[receiving_email]': {
        required: function(){
            return $('' +
                '[name="notification_settings[receive_important_account_alerts]"],' +
                '[name="notification_settings[receive_lead_and_booking_alers]"],' +
                '[name="notification_settings[receive_notifications_for_new_clients]"]').is(':checked')
        },
        email: true
    }
}

window.professionals_update_password = {
    'passwords[current]': {
        required: true
    },
    'passwords[new]': {
        minlength: PASSWORD_MINLENGTH,
        required: true
    },
    'passwords[confirm_new]': {
        required: true,
        minlength: PASSWORD_MINLENGTH,
        equalTo: '[name="passwords[new]"]'
    }
}

window.professionals_update_profile_rules = {
    'profile_information[first_name]': {
        required: true
    },
    'profile_information[last_name]': {
        required: true
    },
    'profile_information[category]': {
        required: true
    },
    'profile_information[countries_served]': {
        required: true
    },
    'profile_information[biography]': {
        required: true
    },
}

window.credit_card_rules = {
    'credit_card[first_name]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    },
    'credit_card[last_name]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    },
    'credit_card[number]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    },
    'credit_card[exp_date_month]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    },
    'credit_card[exp_date_year]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    },
    'credit_card[sec_code]': {
        required: function(e) {
            if($(e).parents('.credit-card-fields').hasClass('fixed')){
                return false;
            }
            return true;
        }
    }
};

$.validator.addMethod('regex', function(value, element){
    console.log(value);
    var regex = /^(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z‌​]{2,6}\b([-a-zA-Z0-9‌​@:%_\+.~#?&=]*)/;
    console.log(regex.test(value));
    return this.optional(element) || regex.test(value);
}, 'Please enter a valid URL.');

window.social_links_rules = {
    'social_links[website]': {
        regex: true
    },'social_links[facebook]': {
        regex: true
    },
    'social_links[twitter]': {
        regex: true
    },
    'social_links[pinterest]': {
        regex: true
    },
    'social_links[instagram]': {
        regex: true
    }
};
