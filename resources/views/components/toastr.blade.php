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

<div class="custom-toastr-wrapper" id="custom-toastr-wrapper">
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
            const wrapper = document.getElementById('custom-toastr-wrapper');
            const template = document.getElementById('custom-toastr-template');
            const defaultPosition = "{{ $position }}";
            const defaultDuration = parseInt("{{ $duration }}") || 5000;

            const notificationStyles = {
                Success: { icon: '<i class="fa-solid fa-check" style="background-color: #198754;"></i>', color: '#198754' },
                Error: { icon: '<i class="fa-solid fa-xmark" style="background-color: #DC3545;"></i>', color: '#DC3545' },
                Warning: { icon: '<i class="fa-solid fa-triangle-exclamation" style="background-color: #FFC107;"></i>', color: '#FFC107' },
                Info: { icon: '<i class="fa-solid fa-circle-info" style="background-color: #0DCAF0;"></i>', color: '#0DCAF0' },
            };

            function getListContainer(pos) {
                let list = wrapper.querySelector(`.custom-toastr-list.pos-${pos}`);
                if (!list) {
                    list = document.createElement('ul');
                    list.className = `custom-toastr-list pos-${pos}`;
                    wrapper.appendChild(list);
                }
                return list;
            }

            function showToast(type, msg, position = null, duration = null) {
                const clone = template.content.cloneNode(true);
                const item = clone.querySelector('.custom-toastr-item');
                
                const finalPosition = position || defaultPosition;
                const finalDuration = duration ? parseInt(duration) : defaultDuration;
                
                const { icon, color } = notificationStyles[type];
                
                item.querySelector('.custom-toastr-icon').innerHTML = icon;
                item.querySelector('.custom-toastr-info').textContent = msg;

                const timeline = item.querySelector('.custom-toastr-timeline');
                timeline.style.backgroundColor = color;
                timeline.style.animationDuration = finalDuration + 'ms';
                timeline.classList.add('custom-toastr-animate');

                item.querySelector('.custom-toastr-close').addEventListener('click', function(e) {
                    const targetItem = e.target.closest('.custom-toastr-item');
                    targetItem.classList.remove('visible');
                    setTimeout(() => targetItem.remove(), 400); 
                });

                const list = getListContainer(finalPosition);

                const isTop = finalPosition.includes('top');
                if (isTop) {
                    list.prepend(item);
                } else {
                    list.appendChild(item);
                }

                const appendedItem = isTop ? list.firstElementChild : list.lastElementChild;

                setTimeout(() => appendedItem.classList.add('visible'), 10);
                setTimeout(() => {
                    if (appendedItem && appendedItem.classList.contains('visible')) {
                        appendedItem.classList.remove('visible');
                    }
                }, finalDuration);
                setTimeout(() => {
                    if (appendedItem && appendedItem.parentNode) {
                        appendedItem.remove();
                    }
                }, finalDuration + 500);
            }

            window.customToastr = showToast;

            @if(session()->has('custom_toastr_messages'))
                @foreach(session('custom_toastr_messages') as $toast)
                    showToast(
                        "{!! addslashes($toast['type']) !!}", 
                        "{!! addslashes($toast['message']) !!}", 
                        {!! $toast['position'] ? "'".addslashes($toast['position'])."'" : 'null' !!}, 
                        {!! $toast['duration'] ? (int)$toast['duration'] : 'null' !!}
                    );
                @endforeach
            @endif
        });
    </script>
@endonce
