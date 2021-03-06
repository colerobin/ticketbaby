var TBABYCONFIGS = function(a, b) {
        function c(a) {
            function b() {
                return g
            }

            function c() {
                return f
            }

            function d() {
                return e
            }

            function h() {
                return i
            }
            a = a || {};
            var i = Math.random();
            return {
                getAllAsyncalls: b,
                getAllConstants: c,
                getAllMessages: d,
                getRandomNumber: h
            }
        }
        var d = null,
            e = {},
            f = {
                sessioncartview: "EVENTDETAIL"
            },
            g = {
                getseatavailability: "index.php/ajax/getSeatAvailability",
                getsessioncart: "index.php/ajax/getSessionCart",
                removesessioncart: "index.php/ajax/removeSessionCart",
                setsessioncart: "index.php/ajax/setSessionCart",
				setSessionCartNew: "index.php/ajax/setSessionCartNew",
                viewcart: "index.php/index/viewcart",
                setsessioncaptcha: "index.php/ajax/setSessionCaptcha",
                timeoutcart: "index.php/ajax/timeOutCart"
            };
        return {
            getInstance: function(a) {
                return d || (d = new c(a)), d
            }
        }
    }(window),
    TBABY = TBABY || {};
! function(a) {
    var b = TBABYCONFIGS.getInstance().getAllAsyncalls(),
        c = TBABYCONFIGS.getInstance().getAllConstants();
    TBABY.init = function(a) {
        this.configs = a, this.eventlistners(), this.configs.c_view == c.sessioncartview && TBABY.stand_alone.loadSessionCart(), parseInt(this.configs.cctr) > 0 && TBABY.stand_alone.captchaCountDown()
    }, TBABY.home = {
        name: "home",
        myhome: function() {}
    }, TBABY.cart = {
        name: "cart"
    }, a.fn.customExtendFunc = function(b) {
        var c = a.extend({
            id: "search",
            text: "customExtendFunc",
            color: null,
            fontStyle: null
        }, b);
        return a("#" + c.id).each(function() {
            a(this).text(c.text), c.color && a(this).css("color", c.color), c.fontStyle && a(this).css("font-style", c.fontStyle)
        })
    }, TBABY.stand_alone = {
        hideAllTooltipContent: function() {
            a("#ticketClassTooltip .modal-title-standard").hide(), a("#ticketClassTooltip .modal-title-premium").hide(), a("#ticketClassTooltip .modal-title-gold").hide(), a("#ticketClassTooltip .modal-title-vip").hide(), a("#ticketClassTooltip .modal-title-afterparty").hide(), a("#ticketClassTooltip .modal-title-afterpartyticket").hide(), a("#ticketClassTooltip .modal-body-standard").hide(), a("#ticketClassTooltip .modal-body-premium").hide(), a("#ticketClassTooltip .modal-body-gold").hide(), a("#ticketClassTooltip .modal-body-vip").hide(), a("#ticketClassTooltip .modal-body-afterparty").hide(), a("#ticketClassTooltip .modal-body-afterpartyticket").hide()
        },
        loadSessionCart: function() {
            a.ajax({
                type: "GET",
                url: TBABY.configs.base_url + b.getsessioncart,
                data: {},
                success: function(b) {
                    var c = a.parseJSON(b);
                    a(".session-cart-list").html(c.cart_session), c.cart_additional_session && c.cart_additional_session.after_ticket_quantity && a(".after_party_ticket_quantity").html(c.cart_additional_session.after_ticket_quantity)
                },
                error: function() {}
            })
        },
        captchaCountDown: function() {
            var c = TBABY.configs.cctr,
                d = setInterval(function() {
                    var e = Math.floor(c / 60),
                        f = c % 60;
                    10 > f && (f = "0" + f), a(".count-down-timer").html(e + ":" + f), 1 > c ? (clearInterval(d), a.ajax({
                        type: "POST",
                        url: TBABY.configs.base_url + b.timeoutcart,
                        data: {},
                        success: function(b) {
                            "TRUE" == a.trim(b) && (window.location.href = TBABY.configs.base_url)
                        },
                        error: function() {
                            location.reload()
                        }
                    })) : c--
                }, 1e3)
        }
    }, TBABY.eventlistners = function() {
        a('button[name="btn-hot-ticket-tab"]').click(function() {
            a(this).removeClass("btn btn-orang btn-lg f1 noBtmRad").addClass("btn btn-black-g btn-lg noBtmRad"), a('button[name="btn-just-announced-ticket-tab"]').removeClass("btn btn-black-g btn-lg noBtmRad").addClass("btn btn-orang btn-lg f1 noBtmRad"), a(".hot_ticket_list").show(), a(".just_announced_list").hide()
        }), a('button[name="btn-just-announced-ticket-tab"]').click(function() {
            a(this).removeClass("btn btn-orang btn-lg f1 noBtmRad").addClass("btn btn-black-g btn-lg noBtmRad"), a('button[name="btn-hot-ticket-tab"]').removeClass("btn btn-black-g btn-lg noBtmRad").addClass("btn btn-orang btn-lg f1 noBtmRad"), a(".just_announced_list").show(), a(".hot_ticket_list").hide()
        }), a('input[name="seat_table"]').click(function() {
            a("#ticketSelect .modal-body").load(TBABY.configs.base_url + b.getseatavailability, {
                event_id: a(this).attr("data-event"),
                ticket_class_id: a(this).attr("data-ticket-class"),
                section: "table"
            }, function(b) {
                a("#ticketSelect .modal-title").html("Choose Table"), a("#ticketSelect").modal({
                    show: !0
                })
            })
        }), a('input[name="seat_ticket"]').click(function() {
			
            a("#ticketSelect .modal-body").load(TBABY.configs.base_url + b.getseatavailability, {
                event_id: a(this).attr("data-event"),
                ticket_class_id: a(this).attr("data-ticket-class"),
                section: "ticket"
            }, function(b) {
                a("#ticketSelect .modal-title").html("Choose Ticket"), a("#ticketSelect").modal({
                    show: !0
                })
            })
        }), a('input[name="after_party_ticket_select"]').click(function() {
            a("#ticketSelect .modal-body").load(TBABY.configs.base_url + b.getseatavailability, {
                event_id: a(this).attr("data-event"),
                ticket_class_id: a(this).attr("data-ticket-class"),
                section: "ticket"
            }, function(b) {
                a("#ticketSelect .modal-title").html("Choose Ticket"), a("#ticketSelect").modal({
                    show: !0
                })
            })
        }), a(".ticket-class-tooltip").click(function() {
            TBABY.stand_alone.hideAllTooltipContent();
            var b = a(this).attr("data-ticket-class-slug");
            if ("vvip-platinum" == b || "vip-platinum" == b) a("#ticketClassTooltip .modal-title-vip").show(), a("#ticketClassTooltip .modal-body-vip").show();
            else if ("gold" == b) a("#ticketClassTooltip .modal-title-gold").show(), a("#ticketClassTooltip .modal-body-gold").show();
            else if ("premium" == b) a("#ticketClassTooltip .modal-title-premium").show(), a("#ticketClassTooltip .modal-body-premium").show();
            else if ("standard" == b) a("#ticketClassTooltip .modal-title-standard").show(), a("#ticketClassTooltip .modal-body-standard").show();
            else if ("after-party" == b) a("#ticketClassTooltip .modal-title-afterparty").show(), a("#ticketClassTooltip .modal-body-afterparty").show();
            else {
                if ("after-party-ticket" != b) return;
                a("#ticketClassTooltip .modal-title-afterpartyticket").show(), a("#ticketClassTooltip .modal-body-afterpartyticket").show()
            }
            a("#ticketClassTooltip").modal({
                show: !0
            })
        }), a(".seating-chart-popup").click(function() {
            a("#seatingChartPopup").modal({
                show: !0
            })
        }),  a(".button-add-to-cart").click(function() {

            a(".alert-error-captcha-select").hide(), a("#captchaSelect").modal({
                show: !0
            })
        }), a(".button-add-to-cart-new").click(function() {
            var quantity_all	=	0;
				$(".quantity_class").each(function() {
				  quantity_all += Number($(this).val());
				});
				//alert(quantity_all);
				//alert(TBABY.configs.base_url + b.setSessionCartNew);
			if(quantity_all > 0){
				var d 		= 	new Date();
				var time 	= 	d.getTime();
				var section	= 	"ticket";
				//alert(quantity);
				//alert(event_id);
				from		=	$('form#add_cart_form').serialize()+ '&section='+section,
				  $.ajax({
						  url: TBABY.configs.base_url + b.setSessionCartNew+"/"+time,
						  type: "POST",
						  //dataType:'json',
						  data:from,
						 /* beforeSend: function() {
							  $('#price_change1_'+text).addClass('loading');
							  $('#price_change1_'+text).html('<img src="/assets/img/2.gif"/>');
						  },*/
						  success: function(data){
								//alert(data);
								if(data == 2){
									alert('Please Check your Quantity');
									return false;
								}else{
									a(".alert-error-captcha-select").hide(), a("#captchaSelect").modal({
										show: !0
									})
								}
							
						 }
				  });
				
				
			
				
			}else{
				alert("Quantity should be greater than 0.");
				return false;
			}	
        }), a(document).on("click", ".session_cart_delete", function() {
            var c = a(this).attr("data-key");
            a.ajax({
                type: "POST",
                url: TBABY.configs.base_url + b.removesessioncart,
                data: {
                    data_key: c
                },
                success: function(a) {
                    TBABY.stand_alone.loadSessionCart()
                },
                error: function() {}
            })
        }), a("button#choose-table-seat").click(function(c) {
            var d = !1;
            a("form.choose-table-seat input:checkbox:checked").length > 0 && ("table" == a("form.choose-table-seat input[name='ticket_section_name']").val() ? d = !0 : a("form.choose-table-seat input:checkbox:checked").each(function() {
			
                var b = a("form.choose-table-seat input[name='ticket_class_class']").val(),
                    c = a("form.choose-table-seat input[name='ticket_selection_type']").val();
                if ("after-party" == b || "adult" == b || "child" == b || "dinner-and-dance" == b || "dance" == b || "2" == c) var e = a("form.choose-table-seat input[name='choose-ticket-quantity-" + a(this).val() + "']").val(),
                    f = a("form.choose-table-seat input[name='choose-ticket-quantity-" + a(this).val() + "']").attr("max");
                else var e = a("form.choose-table-seat select[name='choose-ticket-quantity-" + a(this).val() + "']").val(),
                    f = a("form.choose-table-seat select[name='choose-ticket-quantity-" + a(this).val() + "']").attr("max");
                return "" == a.trim(e) || parseInt(e) < 1 ? void(d = !1) : parseInt(e) > parseInt(f) ? (a(".alert-error-seat-select").html("<strong>Error!</strong> Please correct table/seat quantity."), void(d = !1)) : void(d = parseInt(e) > 0 ? !0 : !1)
            })), d ? a.ajax({
                type: "POST",
                url: TBABY.configs.base_url + b.setsessioncart,
                data: a("form.choose-table-seat").serialize(),
                success: function(b) {
                    TBABY.stand_alone.loadSessionCart(), a("#ticketSelect").modal("hide"), a("html, body").animate({
                        scrollTop: a(".session-cart-list").offset().top
                    }, 1500)
                },
                error: function() {
                    a("#ticketSelect").modal("hide")
                }
            }) : a(".alert-error-seat-select").show()
        }), a("button#captcha-verify").click(function(c) {
            "" != grecaptcha.getResponse() ? a.ajax({
                type: "POST",
                url: TBABY.configs.base_url + b.setsessioncaptcha,
                data: a("form.captcha-select,form.form-event-details").serialize(),
                success: function(c) {
                    var d = a.parseJSON(c);
                    "TRUE" == a.trim(d.success) ? window.location.href = TBABY.configs.base_url + b.viewcart : (a(".alert-error-captcha-select").html("<strong>Error!</strong>  " + d.message), a(".alert-error-captcha-select").show(), grecaptcha.reset())
                },
                error: function() {
                    a(".alert-error-captcha-select").html("<strong>Error!</strong> You can't leave Captcha Code empty!."), a(".alert-error-captcha-select").show()
                }
            }) : (a(".alert-error-captcha-select").html("<strong>Error!</strong> You can't leave Captcha Code empty!."), a(".alert-error-captcha-select").show())
        }), a("#form-billing-info").bootstrapValidator({
            live: "disabled",
            message: "This value is not valid",
            feedbackIcons: {
                valid: "glyphicon glyphicon-ok",
                invalid: "glyphicon glyphicon-remove",
                validating: "glyphicon glyphicon-refresh"
            },
            fields: {
                customer_first_name: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The first name is required and cannot be empty"
                        }
                    }
                },
                customer_last_name: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The last name is required and cannot be empty"
                        }
                    }
                },
                customer_email: {
                    validators: {
                        notEmpty: {
                            message: "The email address is required and cannot be empty"

                        },
                        emailAddress: {
                            message: "The input is not a valid email address"
                        }
                    }
                },
                first_name: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The first name is required and cannot be empty"
                        }
                    }
                },
                last_name: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The last name is required and cannot be empty"
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: "The email address is required and cannot be empty"
                        },
                        emailAddress: {
                            message: "The input is not a valid email address"
                        }
                    }
                },
                contact_number: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The contact number is required and cannot be empty"
                        }
                    }
                },
                address: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The address is required and cannot be empty"
                        }
                    }
                },
                area: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The area is required and cannot be empty"
                        }
                    }
                },
                city: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The city is required and cannot be empty"
                        }
                    }
                },
                post_code: {
                    group: ".col-xs-5",
                    validators: {
                        notEmpty: {
                            message: "The post code is required and cannot be empty"
                        }
                    }
                }
            }
        }).on("success.form.bv", function(a, b) {}).on("error.form.bv", function(b, c) {
            var d = a(b.target),
                e = d.data("bootstrapValidator"),
                f = e.getInvalidFields().eq(0),
                g = f.parents(".collapse");
            g.collapse("show")
        }).on("status.field.bv", function(a, b) {
            b.element.parents(".form-group").removeClass("has-success"), b.bv.disableSubmitButtons(!1)
        }), a(".form-home-user-register").bootstrapValidator({
            live: "disabled",
            message: "This value is not valid",
            feedbackIcons: {
                valid: "glyphicon glyphicon-ok",
                invalid: "glyphicon glyphicon-remove",
                validating: "glyphicon glyphicon-refresh"
            },
            fields: {
                customer_name: {
                    validators: {
                        notEmpty: {
                            message: "Name cannot be empty"
                        }
                    }
                },
                customer_email: {
                    validators: {
                        notEmpty: {
                            message: "Email cannot be empty"
                        },
                        emailAddress: {
                            message: "Invalid email address!"
                        }
                    }
                },
                customer_password: {
                    validators: {
                        notEmpty: {
                            message: "Password cannot be empty"
                        }
                    }
                }
            }
        }).on("success.form.bv", function(b, c) {
            b.preventDefault();
            var d = a(b.target),
                e = d.data("bootstrapValidator");
            a.post(d.attr("action"), d.serialize(), function(b) {
                1 == b.success ? (a(".form-home-user-register div.error-msg").hide(), a(".form-home-user-register") && a(".form-home-user-register")[0] && (a(".form-home-user-register")[0].reset(), e.resetForm()), a("#userRegisterConfirmedToolTip").modal({
                    show: !0
                })) : (a(".form-home-user-register div.error-msg").show(), a(".form-home-user-register div.error-msg").html(b.message))
            }, "json")
        }).on("error.form.bv", function(b, c) {
            var d = a(b.target),
                e = d.data("bootstrapValidator"),
                f = e.getInvalidFields().eq(0),
                g = f.parents(".collapse");
            g.collapse("show")
        }).on("status.field.bv", function(a, b) {
            b.element.parents(".form-group").removeClass("has-success"), b.bv.disableSubmitButtons(!1)
        }), a('[data-toggle="popover"]').popover(), a(".tbabywinopenurl").click(function() {
            a(this).attr("data-location") && (window.location.href = a(this).attr("data-location"))
        })
    }
}(jQuery);