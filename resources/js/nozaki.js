import interact from 'interactjs'
import '/resources/css/nozaki.css'

//ドラッグ&ドロップ用のjs
var categoryElements = document.querySelectorAll('.category-zone');
//draggingの処理
// target elements with the "draggable" class
interact('.draggable')
    .draggable({
        // 慣性のオンオフ
        inertia: false,
        // keep the element within the area of it's parent
        modifiers: [
            interact.modifiers.restrictRect({
                //親要素で拘束しているためコメントアウトが必要だよ！！！
                // restriction: 'parent',
                endOnly: true
            })
        ],
        // enable autoScroll
        autoScroll: true,

        listeners: {
            // call this function on every dragmove event
            move: dragMoveListener,
            end(event) {
                const parent = event.target.closest('.category-zone');
                if (parent) {
                    const parentRect = parent.getBoundingClientRect();
                    const elementRect = event.target.getBoundingClientRect();
                    // 要素が親要素の外でドロップされた場合、元の位置に戻す
                    if (
                        elementRect.right < parentRect.left ||
                        elementRect.left > parentRect.right ||
                        elementRect.bottom < parentRect.top ||
                        elementRect.top > parentRect.bottom
                    ) {
                        event.target.style.transform = 'translate(0px, 0px)';
                        event.target.setAttribute('data-x', 0);
                        event.target.setAttribute('data-y', 0);
                    }
                }
            }
        }
    })

function dragMoveListener (event) {
    var target = event.target
    // keep the dragged position in the data-x/data-y attributes
    var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
    var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

    // translate the element
    target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

    // update the posiion attributes
    target.setAttribute('data-x', x)
    target.setAttribute('data-y', y)
}

// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener

//drag and dropの処理
/* The dragging code for '.draggable' from the demo above
 * applies to this demo as well so it doesn't have to be repeated. */

// enable draggables to be dropped into this
interact('.dropzone').dropzone({
    // only accept elements matching this CSS selector
    accept: '.draggable',
    // Require a 75% element overlap for a drop to be possible
    overlap: 0.75,

    // listen for drop related events:

    ondropactivate: function (event) {
        // add active dropzone feedback
        event.target.classList.add('drop-active')
    },
    ondragenter: function (event) {
        var draggableElement = event.relatedTarget
        var dropzoneElement = event.target

        // feedback the possibility of a drop
        dropzoneElement.classList.add('drop-target')
        draggableElement.classList.add('can-drop')
        // draggableElement.textContent = 'Dragged in'
    },
    ondragleave: function (event) {
        // remove the drop feedback style
        event.target.classList.remove('drop-target')
        event.relatedTarget.classList.remove('can-drop')
        // event.relatedTarget.textContent = 'Dragged out'
    },
    ondrop: function (event) {
        // event.relatedTarget.textContent = 'Dropped'
        const dropzoneElement = event.target;
        const draggableElement = event.relatedTarget;

        const clone = draggableElement.cloneNode(true);
        clone.removeAttribute('id'); // id名を削除
        clone.className = 'mx-3 h-fit text-center save-card'; // クラス名を指定されたもののみに変更
        clone.style.transform = 'translate(0px, 0px)';
        clone.setAttribute('data-x', 0);
        clone.setAttribute('data-y', 0);

        //icons
        const closeButton = document.createElement('i');
        closeButton.className = 'bi bi-x-circle';
        closeButton.style.position = 'absolute';
        closeButton.style.top = '-8px'; // 上部から8pxはみ出す
        closeButton.style.right = '-8px'; // 右部から8pxはみ出す
        closeButton.style.cursor = 'pointer';
        closeButton.style.fontSize = '1rem';
        closeButton.style.color = 'black'; // 文字色を黒に設定
        closeButton.style.backgroundColor = 'white'; // 背景色を白に設定
        closeButton.style.borderRadius = '50%'; // 円形にするためのスタイル

        closeButton.addEventListener('click', () => {
            clone.remove();
        });

        clone.appendChild(closeButton);
        clone.style.position = 'relative'; // 相対位置にすることで、アイコンの位置を正しく設定

        dropzoneElement.appendChild(clone);
    },
    ondropdeactivate: function (event) {
        // remove active dropzone feedback
        event.target.classList.remove('drop-active')
        event.target.classList.remove('drop-target')
    }
})

// interact('.drag-drop')
//     .draggable({
//         inertia: true,
//         modifiers: [
//             interact.modifiers.restrictRect({
//                 restriction: 'parent',
//                 endOnly: true
//             })
//         ],
//         autoScroll: true,
//         // dragMoveListener from the dragging demo above
//         listeners: { move: dragMoveListener }
//     })
