@props(['position' => 'bottom-right', 'duration' => 5000])

@once
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .custom-toastr-wrapper {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
        }

        .custom-toastr-wrapper * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .custom-toastr-list {
            position: fixed;
            z-index: 9999;
            list-style: none;
            display: flex;
            flex-direction: column;
        }

        /* Positions */
        .pos-top-right { top: 2rem; right: 2rem; }
        .pos-bottom-right { bottom: 2rem; right: 2rem; }
        .pos-top-left { top: 2rem; left: 2rem; }
        .pos-bottom-left { bottom: 2rem; left: 2rem; }
        .pos-top-center { top: 2rem; left: 50%; transform: translateX(-50%); align-items: center; }
        .pos-bottom-center { bottom: 2rem; left: 50%; transform: translateX(-50%); align-items: center; }

        .custom-toastr-item {
            position: relative;
            width: 20rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: space-between;
            background-color: white;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin: 0.5rem 0;
            padding: 1rem;
            opacity: 0;
            transition: all 0.4s ease;
        }

        /* Start Animation States */
        .pos-top-right .custom-toastr-item,
        .pos-bottom-right .custom-toastr-item { transform: translateX(100%); }
        .pos-top-left .custom-toastr-item,
        .pos-bottom-left .custom-toastr-item { transform: translateX(-100%); }
        .pos-top-center .custom-toastr-item { transform: translateY(-100%); }
        .pos-bottom-center .custom-toastr-item { transform: translateY(100%); }

        /* Visible State */
        .custom-toastr-item.visible {
            transform: translate(0, 0) !important;
            opacity: 1;
        }

        .custom-toastr-icon {
            font-size: 1.25rem;
            color: rgba(0, 0, 0, 0.75);
        }

        .custom-toastr-icon i {
            padding: 5px;
            font-size: 16px;
            width: 30px;
            height: 30px;
            line-height: 20px;
            text-align: center;
            color: #fff !important;
            border-radius: 50%;
        }

        .custom-toastr-item-container {
            flex-grow: 1;
        }

        .custom-toastr-info {
            font-size: 0.8rem;
            color: rgba(0, 0, 0, 0.75);
        }

        .custom-toastr-close {
            border: none;
            background-color: transparent;
            font-size: 1rem;
            color: rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .custom-toastr-close:active {
            color: black;
        }

        .custom-toastr-timeline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0.2rem;
            transform-origin: left;
        }

        @keyframes custom-toastr-countdown {
            to { transform: scaleX(0); }
        }

        .custom-toastr-animate {
            animation-name: custom-toastr-countdown;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
        }
    </style>
@endonce

<div class="custom-toastr-wrapper">
    <ul class='custom-toastr-list pos-{{ $position }}' id="custom-toastr-list" data-duration="{{ $duration }}"></ul>
</div>

<template id="custom-toastr-template">
    <li class='custom-toastr-item'>
        <span class='custom-toastr-icon'></span>
        <div class='custom-toastr-item-container'>
            <p class='custom-toastr-info'></p>
        </div>
        <button class='custom-toastr-close'>x</button>
        <div class='custom-toastr-timeline'></div>
    </li>
</template>

@once
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const list = document.getElementById('custom-toastr-list');
            const template = document.getElementById('custom-toastr-template');
            const duration = parseInt(list.getAttribute('data-duration')) || 5000;

            const notificationStyles = {
                Success: { icon: '<i class="fa-solid fa-check" style="background-color: #198754;"></i>', color: '#198754' },
                Error: { icon: '<i class="fa-solid fa-xmark" style="background-color: #DC3545;"></i>', color: '#DC3545' },
                Warning: { icon: '<i class="fa-solid fa-triangle-exclamation" style="background-color: #FFC107;"></i>', color: '#FFC107' },
                Info: { icon: '<i class="fa-solid fa-circle-info" style="background-color: #0DCAF0;"></i>', color: '#0DCAF0' },
            };

            function showToast(type, msg) {
                const clone = template.content.cloneNode(true);
                const item = clone.querySelector('.custom-toastr-item');
                
                const { icon, color } = notificationStyles[type];
                
                item.querySelector('.custom-toastr-icon').innerHTML = icon;
                item.querySelector('.custom-toastr-info').textContent = msg;

                const timeline = item.querySelector('.custom-toastr-timeline');
                timeline.style.backgroundColor = color;
                timeline.style.animationDuration = duration + 'ms';
                timeline.classList.add('custom-toastr-animate');

                item.querySelector('.custom-toastr-close').addEventListener('click', function(e) {
                    const targetItem = e.target.closest('.custom-toastr-item');
                    targetItem.classList.remove('visible');
                    setTimeout(() => targetItem.remove(), 400); 
                });

                if (list.classList.contains('pos-top-right') || list.classList.contains('pos-top-left') || list.classList.contains('pos-top-center')) {
                    list.prepend(item);
                } else {
                    list.appendChild(item);
                }

                const appendedItem = list.classList.contains('pos-top-right') || list.classList.contains('pos-top-left') || list.classList.contains('pos-top-center') 
                    ? list.firstElementChild 
                    : list.lastElementChild;

                setTimeout(() => appendedItem.classList.add('visible'), 10);
                setTimeout(() => appendedItem.classList.remove('visible'), duration);
                setTimeout(() => {
                    if (appendedItem && appendedItem.parentNode) {
                        appendedItem.remove();
                    }
                }, duration + 500);
            }

            @if(session()->has('custom_toastr.success'))
                showToast('Success', "{!! addslashes(session('custom_toastr.success')) !!}");
            @endif
            
            @if(session()->has('custom_toastr.error'))
                showToast('Error', "{!! addslashes(session('custom_toastr.error')) !!}");
            @endif

            @if(session()->has('custom_toastr.warning'))
                showToast('Warning', "{!! addslashes(session('custom_toastr.warning')) !!}");
            @endif

            @if(session()->has('custom_toastr.info'))
                showToast('Info', "{!! addslashes(session('custom_toastr.info')) !!}");
            @endif
            
            window.customToastr = showToast;
        });
    </script>
@endonce
