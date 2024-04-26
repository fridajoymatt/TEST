<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>

    @include('component.toastrNotification')
    {!! Toastr::message() !!}

    <script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    </script>
        <div id="back">

<style>
    .body {
      margin: 0;
      overflow: hidden;
    }
    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #2079a3;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<div class="body">
  <div id="particles-js"></div>
  <script>
    particlesJS('particles-js', {
      particles: {
        number: {
          value: 80,
          density: {
            enable: true,
            value_area: 800
          }
        },
        color: {
          value: '#ffffff'
        },
        shape: {
          type: 'circle',
          stroke: {
            width: 0,
            color: '#000000'
          },
          polygon: {
            nb_sides: 5
          }
        },
        opacity: {
          value: 0.5,
          random: false,
          anim: {
            enable: false,
            speed: 1,
            opacity_min: 0.1,
            sync: false
          }
        },
        size: {
          value: 3,
          random: true,
          anim: {
            enable: false,
            speed: 40,
            size_min: 0.1,
            sync: false
          }
        },
        line_linked: {
          enable: true,
          distance: 150,
          color: '#ffffff',
          opacity: 0.4,
          width: 1
        },
        move: {
          enable: true,
          speed: 6,
          direction: 'none',
          random: false,
          straight: false,
          out_mode: 'out',
          bounce: false,
          attract: {
            enable: false,
            rotateX: 600,
            rotateY: 1200
          }
        }
      },
      interactivity: {
        detect_on: 'canvas',
        events: {
          onhover: {
            enable: true,
            mode: 'grab'
          },
          onclick: {
            enable: true,
            mode: 'push'
          },
          resize: true
        },
        modes: {
          grab: {
            distance: 140,
            line_linked: {
              opacity: 1
            }
          },
          bubble: {
            distance: 400,
            size: 40,
            duration: 2,
            opacity: 8,
            speed: 3
          },
          repulse: {
            distance: 200,
            duration: 0.4
          },
          push: {
            particles_nb: 4
          },
          remove: {
            particles_nb: 2
          }
        }
      },
      retina_detect: true
    });
  </script>
</div>


        {{-- <canvas id="canvas" class="canvas-back"></canvas> --}}

        {{-- <div class="backRight">

        </div>
        <div class="backLeft">
        </div> --}}
        </div>

        <div id="slideBox">
            <div class="topLayer">
                <div class="right">
                    @yield('content')
                </div>
            </div>
            </div>
    <style>
        @charset "UTF-8";
    body {
      margin: 0;
      height: 100%;
      overflow: hidden;
      width: 100% !important;
      box-sizing: border-box;
      font-family: "Roboto", sans-serif;
    }

    .backRight {
      position: absolute;
      right: 0;
      width: 50%;
      height: 100%;
      background: #03A9F4;
    }

    .backLeft {
      position: absolute;
      left: 0;
      width: 50%;
      height: 100%;
      background: #2079a3 ;
    }

    #back {
      width: 100%;
      height: 100%;
      position: absolute;
      z-index: -999;
    }

    .canvas-back {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 10;
    }

    #slideBox {
      width: 50%;
      max-height: 100%;
      height: 100%;
      overflow: hidden;
      margin-left: 50%;
      position: absolute;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    .topLayer {
      width: 200%;
      height: 100%;
      position: relative;
      left: 0;
      left: -100%;
    }

    label {
      font-size: 0.8em;
      text-transform: uppercase;
    }

    input {
      background-color: transparent;
      border: 0;
      outline: 0;
      font-size: 1em;
      padding: 8px 1px;
      margin-top: 0.1em;
    }

    .left {
      width: 50%;
      height: 100%;
      overflow: scroll;
      background: #2C3034;
      left: 0;
      position: absolute;
    }
    .left label {
      color: #e3e3e3;
    }
    .left input {
      border-bottom: 1px solid #e3e3e3;
      color: #e3e3e3;
    }
    .left input:focus, .left input:active {
      border-color: #03A9F4;
      color: #03A9F4;
    }
    .left input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px #2C3034 inset;
      -webkit-text-fill-color: #e3e3e3;
    }
    .left a {
      color: #03A9F4;
    }

    .right {
      width: 50%;
      height: 100%;
      overflow: scroll;
      background: #f9f9f9;
      right: 0;
      position: absolute;
    }
    .right label {
      color: #212121;
    }
    .right input {
      border-bottom: 1px solid #212121;
    }
    .right input:focus, .right input:active {
      border-color: #2079a3 ;
    }
    .right input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px #f9f9f9 inset;
      -webkit-text-fill-color: #212121;
    }

    .content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 100%;
      width: 80%;
      margin: 0 auto;
      position: relative;
    }

    .content h2 {
      font-weight: 300;
      font-size: 2.6em;
      margin: 0.2em 0 0.1em;
    }

    .left .content h2 {
      color: #03A9F4;
    }

    .right .content h2 {
      color: #2079a3 ;
    }

    .form-element {
      margin: 1.6em 0;
    }
    .form-element.form-submit {
      margin: 1.6em 0 0;
    }

    .form-stack {
      display: flex;
      flex-direction: column;
    }

    .checkbox {
      -webkit-appearance: none;
      outline: none;
      background-color: #e3e3e3;
      border: 1px solid #e3e3e3;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
      padding: 12px;
      border-radius: 4px;
      display: inline-block;
      position: relative;
    }

    .checkbox:focus, .checkbox:checked:focus,
    .checkbox:active, .checkbox:checked:active {
      border-color: #03A9F4;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .checkbox:checked {
      outline: none;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05), inset 15px 10px -12px rgba(255, 255, 255, 0.1);
    }

    .checkbox:checked:after {
      outline: none;
      content: "✓";
      color: #03A9F4;
      font-size: 1.4em;
      font-weight: 900;
      position: absolute;
      top: -4px;
      left: 4px;
    }

    .form-checkbox {
      display: flex;
      align-items: center;
    }
    .form-checkbox label {
      margin: 0 6px 0;
      font-size: 0.72em;
    }

    @media only screen and (max-width: 768px) {
      #slideBox {
        width: 80%;
        margin-left: 20%;
      }

      .signup-info, .login-info {
        display: none;
      }
    }
    </style>
</body>
</html>
