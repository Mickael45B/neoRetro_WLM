
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Festive&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style_Copie.css">

        <title>
            site fictif
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script  type ="module"  src ="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script> 

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	</head>

	<body>

<style>

* {
-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
		box-sizing: border-box;
}

html {
	min-height: 100%;
	position: relative;
}

body {
	height: 100%;
	font-family: "Tahoma", sans-serif;
	font-size: 8pt;
    background-image: url(labyrintheBrique.jpg);
          background-size: cover;
    }

a {
	color: #0088e4;
}

.main {
	display: flex;
	height: auto;
	min-height: 306px;
	padding: 10px;

    justify-content: center;

	position:absolute;
	top:0;
	bottom:0;
	left:0;
	right:0;
	overflow:hidden;
}

.mainwindow {
    background-color: #ECF6F9;
    border: thin solid #707070;
    border-radius: 8px;

    box-shadow: 0 0 5px #00000050;
}

.aerobutton {
    background-color: transparent;
    border: 2px solid transparent;
}
.aerobutton:hover {
    border-image: url("icones/aerobutton_border.png") 2 round;
}
.aerobutton:active {
    border-image: url("icones/aerobutton_border_down.png") 2 round;
}

.emoticon {
    margin: 0 3px;
}

.smallarrowbtn {
    display: flex;
    flex-direction: row;
    overflow: hidden;
    align-items: center;
}
.arrowdown {
    height: 5px;
    margin-left: 4px;
}

.alerts {
    display: flex;
    align-items: center;
    height: 19px;
    background-color: white;
    border: thin solid #bed6e0;
    border-bottom: none;
}
    .alerttext {
    margin: 0; margin-left: 3px; 
    }
	
#contacts {
    background-color: white;
    float: left;
    width: 30%;
    min-width: 274px;
    height: 100%;
    position: relative;
}

    #contacts > .header {
        background-image: url("frames/msgres_fullheader.png");
        background-repeat: no-repeat;
        background-size:100% 100%;
        height: 95px;
        width: 100%;
    }
        .titlebar {
            padding: 6px;
            padding-bottom: 5px;
            height: 28px;
            display: flex;
            flex-direction: row;
            height: fit-content;
        }
            #title {
                height: 10px;
                margin-top: 4px;
                margin-left: 4px;
            }

    .user-info {
        display: flex;
        height: 69px;
        width: 100%;
        box-sizing: border-box;
        padding: 8px 14px;
    }
        #frame {
            height: 62px;
            width: auto;
            position: absolute;
            top: 31px;
            left: 9px;
        }
        #avatar {
            height: 48px;
            width: auto;
            border-radius: 2px;
        }

    .profile {
        margin: auto;
        margin-left: 14px;
        margin-top: 3px;
        height: 100%
    }
        #user {
            padding: 0;
            height: fit-content;
            display: flex;
            text-align: start;
            align-items: center;
        }
            #user > h3 {
                font-size: 10pt;
                font-weight: 600;
                color: white;
                margin: 0;
            }
            #status {
                margin: 0;
                font-size: 8pt;
                color: #B9DDE7;
                margin-left: 8px;
            }

        #message {
            padding: 0;
            margin: 0;
            height: fit-content;
            display: flex;
            text-align: start;
            align-items: center;

            color: #B9DDE7;
            padding-top: 2px;
            padding-bottom: 3px;
            font-size: 8pt;
        }
        .arrowcontacts {
            margin-left: 8px;
            fill: #B9DDE7 !important;
        }

    #contactsnav {
        background-image: url("frames/msgres_navbar.png");
        background-size:100% 100%;
        overflow: hidden;
        display: flex;
        flex-direction: row;
        height: 31px;
        padding: 0;
        box-shadow: 0px 1px 2px #00000077;
    }
        .iconbar {
            list-style: none;
            width: 50%;
            margin: 0;
            padding: 3px 8px 2px 8px;
        }
            .contactaction {
                height: 25px;
                width: 28px;
                margin: 0 2px;
                marker: none;
            }
                #left > .contactaction {
                    float: left;
                }
                #right > .contactaction {
                    float: right;
                }

    .search {
        display: flex;
        flex-direction: row;
        overflow: hidden;
        height: 38px;
        padding: 8px 8px 8px 7px;

        border-bottom: thin solid #e2eaf3;
    }
        #contact-search {
            font-size: 8pt;
            height: 23px;
            width: 100%;
            padding: 8px;
            margin-right: 7px;
            
            border: thin solid #c7c7c7;
            box-shadow: inset 0 0 3px #0000002a;
        }
        #contact-search:focus {
            border: thin solid #52c9fd;
            box-shadow: 0 0 6px #52cafdbe;
        }

        .searchbar-btn {
            height: 23px;
            width: 22px;
            border: 2px solid transparent;
        }
        .searchbar-btn:hover {
            border-image: url("icones/button_border.png") 2 round;
        }
        .searchbar-btn:active {
            border-image: url("icones/button_border_down.png") 2 round;
        }


        .listitem {
            border: none;
            font-size: 8pt;
            text-align: start;
            height: 19px;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            background-color: white;
        }
        .listitem:focus {
            background-color: #D2EAF6;
        }
            .arrow {
                width: 9px;
                height: 9px;
                margin-right: 2px;
                background: url("icones/arrows.png") 0 0;
            }

            .contact {
                padding-left: 19px;
                display: flex;
                flex-direction: row;
                align-items: center;
            }
                .status-icon {
                    height: 100%;
                    box-sizing: content-box;
                }
                .contact-text {
                    margin: 0;
                    text-anchor: middle;
                    display: inline-block;
                    
                    text-overflow: ellipsis;
                }
                .message {
                    overflow: hidden;
                    white-space: nowrap;
                }

    #footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        margin: 0;
        padding: 5px 10px;
        background-color: #ECF6F9;
        border-radius: 0 0 8px 8px;
        border-top: thin solid #BED6E0;
    }
        #ad {
            display: block;
            margin: 10px auto;
        }
		
#chat {
    height: 100%;
    width: 100%;
    min-width: 420px;
    margin-left: 8px;
    display: flex;
    flex-direction: column;
}
    .tabs {
        height: 27px;
        padding: 2px;
        overflow: hidden;
        display: flex;
        flex-direction: row;
    }
        .tabbutton {
            height: 23px;
            width: 100%;
            min-width: 100px;

            margin: 0 2px;
            padding: 0 5px;
            border: thin solid #B8BDBD;
            border-radius: 6px 6px 0 0;

            background-color: #EFF9F9;
            display: flex;
            flex-direction: row;
        }
        .tabbutton > .name {
            margin-top: 4px;
            text-anchor: middle;

            font-size: 8pt;
        }
    
    #chat > .header {
        border-top: thin solid #707070;
        image-rendering: pixelated;
        background-image: url("frames/chat_header.png");
        background-size: 100% 100%;

        margin: 0;
        height: 77px;
        padding: 7px;

        box-shadow: 0px 1px 4px #00000057;
    }
        #info {
            display: flex;
        }
            #chaticon {
                height: 16px;
            }
            #text {
                display: flex;
                flex-direction: column;
                margin-left: 5px;
            }
                #text > #name {
                    font-weight: bold;
                    color: #333333;
                }
                #text > #message {
                    color: #6F8A92;
                    margin: 0;
                }
            
        #navbars {
            display: flex;
            flex-direction: row;
            margin-top: 3px;
            justify-content: space-between;
        }
            .chatnav {
                list-style: none;
                margin: 0;
                height: 33px;
                padding: 0;
            }
                .chataction {
                    height: 100%;
                    width: 33px;
                    margin-left: 5px;
                }
                    .chatnav > #left {
                        width: 100%;
                        min-width: 230px;
                    }
                    .chatnav > #right {
                        width: 10%;
                        min-width: 84px;
                        
                    }
                    .chatnav#left > .chataction {
                        float: left;
                    }
                    .chatnav#right > .chataction {
                        float: right;
                    }
                #chatnav-expand {
                    padding: 0 3px;
                    width: 40px;
                }

    .conversation {
        height: 100%;
        display: flex;
        padding: 10px;
        padding-right: 0;
        padding-bottom: 15px;
    }
        #messages {
            width: 100%;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
        }
            .chattext {
                font-family: "Tahoma", sans-serif;
                width: 100%;
                resize: none;
                border: thin solid #BED6E0;
            }
            #recieve {
                display: flex;
                flex-direction: column;
                height: 100%;
            }
                #display {
                    margin: 0;
                    height: 100%;
                }
            
            #handle {
                background-image: url("icones/30417.png");
                background-repeat: no-repeat;
                background-position: center;
                height: 10px;
            }
            
            #send {
                display: flex;
                flex-direction: column;
                height: 200px;
            }
                #options {
                    background-image: url("frames/chat_editheader.png");
                    border: thin solid #bed6e0;
                    height: 29px;
                    margin: 0;
                    padding: 2px;
                }
                    .textoption {
                        height: 24px;
                        width: auto;
                        padding: 0 4px;
                        float: left;
                    }
                    .noarrow {
                        width: 32px;
                    }
                #write {
                    height: 100%;
                    margin: 0;
                    border-top: none;
                    font-size: 10pt;
                    padding: 4px 8px;
                }
                #bottomtabs {
                    display: flex;
                    justify-content: space-between;
                    height: 24px;
                    margin: 0;
                    position: relative;
                }
                    .editortab {
                        width: 26px;
                        height: 24px;
                        margin: 0;
                        padding: 0;
                        
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        border: thin solid #bed6e0;
                        border-top: none;
                        background-color: white;
                    }
                        .selected {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            height: 25px;

                            border-top: 2px solid white;
                        }
                        .unselected {
                            margin-left: 25px;
                            border-left: none;
                            background: url("icones/editortab.png");
                            image-rendering: pixelated;
                        }
                        .unselected:hover {
                            background: url("icones/editortab_down.png");
                            background-size: 100% auto;
                            image-rendering: pixelated;
                        }
                    #sendbutton {
                        height: 21px;
                        padding: 0 18px;
                        margin: 2px;

                        font-size: 8pt;
                        color: #001563;

                        background-image: url("icones/button_inside.png");
                        background-size: 100% auto;
                        border: 3px solid transparent;
                        border-image: url("icones/button_border.png") 3;
                    }
                    #sendbutton:hover {
                        border-image: url("icones/button_border_focus.png") 3;
                    }
                    #sendbutton:active {
                        padding: 0 20px;
                        filter: brightness(93%);
                        border: thin solid #286088;
                        border-radius: 3px;
                        box-shadow: inset 1px 1px 2px #00000077;
                    }
                    #sendbutton:disabled {
                        background-image: none;
                        background-color: #f0f0f0;
                        border-image: url("icones/button_border_disabled.png") 3;
                        color: #c9c1c1;
                    }

                    #search {
                        float: right;
                        width: 23px;
                        height: 21px;
                        margin: 2px;

                        background: url("sprites/653_multi.png") 0 0;
                        border: none;
                    }
                    #search:hover {
                        background: url("sprites/653_multi.png") -23px 0;
                    }
                    #search:active {
                        background: url("sprites/653_multi.png") -46px 0;
                    }
                    #search:disabled {
                        background: url("sprites/653_multi.png") -69px 0;
                    }
        #avatars {
            height: 100%;
            position: relative;
        }
            #topavatar {
                position: relative;
            }
            #bottomavatar {
                position: absolute;
                bottom: 0;
            }
                .avatar {
                    margin: 9px;
                    height: 96px;
                    border-radius: 2px;
                }
                .frame {
                    position: absolute;
                    top: 0;
                    left: 0;
                }
            .avatarnav {
                height: 18px;
            }
                .avataraction {
                    height: 100%;
                }

        #expand {
            margin-left: 18px;
        }
            .expandbutton {
                background: url(sprites/1450_multi.png) 0 0;
                background-repeat: no-repeat;
                border: none;

                padding: 0;
                width: 12px;
                height: 31px;
            }
            .expandbutton:hover {
                background: url(sprites/1450_multi.png) 26px 0;
            }
            .expandbutton:active {
                background: url(sprites/1450_multi.png) 13px 0;
            }

</style>







<div class="main">
            <div class="mainwindow" id="contacts">
                <div class="header">
                    <div class="titlebar">
                        <img src="icones/live_logo.png" alt="Windows Live Logo">
                        <img id="title" src="frames/title_text.png">
                    </div>
                    <div class="user-info">
                        <img id="avatar" src="../00_general/avatars/msn.png" alt="Profile Picture">
                        <img id="frame"  src="../00_general/iconesframeProfil/frame_48.png">
                        <div class="profile">
                            <button class="aerobutton" id="user">
                                <h3>AndroidWG</h3>
                                <p id="status">(Busy)</p>
                                <img class="arrowdown arrowcontacts" src="svg/small_arrow.svg">
                            </button>
                            <button class="aerobutton" id="message">
                                <p style="margin: 0;">stayin alive</p>
                                <img class="arrowdown arrowcontacts" src="svg/small_arrow.svg">
                            </button>
                        </div>
                    </div>
                </div>
                <div id="contactsnav">
                    <ul class="iconbar" id="left">
                        <button class="aerobutton contactaction" style="icones/background:url(1480.png) no-repeat center;"></button>
                        <button class="aerobutton contactaction" style="icones/background:url(978.png) no-repeat center;"></button>
                        <button class="aerobutton contactaction" style="icones/background:url(1484.png) no-repeat center;"></button>
                    </ul>
                    <ul class="iconbar" id="right">
                        <button class="aerobutton contactaction" style="icones/background:url(parametreCompte.png) no-repeat center;"></button>
                        <button class="aerobutton contactaction" style="icones/background:url(329.png) no-repeat center;"></button>
                    </ul>
                </div>
                <div class="search">
                    <input id="contact-search" type="text" placeholder="Find a contact...">
                    <button class="searchbar-btn" style="background:url(icones/1131.png) no-repeat center;"></button>
                    <button class="searchbar-btn" style="background:url(icones/1132.png) no-repeat center;"></button>
                </div>
                <div class="contact-list">
                    <button class="listitem headerlist">
                        <img class="arrow" src="icones/arrow_placeholder.png">
                        <b>Online ( 4 )</b>
                    </button>
                    <button class="listitem contact">
                        <img class="aerobutton status-icon" src="../00_general/icones/statutProfil/online.png" alt="Online">
                        <span class="contact-text name">ThatXPUser&nbsp;-&nbsp;</span>
                        <p class="contact-text message" style="color: darkgray;">i'm sad all day until i get to talk with friends, online friends that is</p>
                    </button>
                    <button class="listitem contact">
                        <img class="aerobutton status-icon" src="../00_general/icones/statutProfil/busy.png" alt="Online">
                        <span class="contact-text name">ctaetsh&nbsp;-&nbsp;</span>
                        <img class="emoticon" src="icones/595.png">
                        <a href="#" class="contact-text message">Black Eyed Peas - I Gotta Feeling</a>
                    </button>
                    <button class="listitem contact">
                        <img class="aerobutton status-icon" src="../00_general/icones/statutProfil/away.png" alt="Online">
                        <span class="contact-text name">jake&nbsp;-&nbsp;</span>
                        <p class="contact-text message" style="color: darkgray;">working on writing for ao3!!</p>
                    </button>
                </div>
                <div id="footer">
                    <span style="color: #9bb3d4;">Advertisement</span>
                    <img id="ad" src="frames/ad.png" alt="">
                </div>
            </div>
        </div>


        </body>
</html>

