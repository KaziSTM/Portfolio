import { watch, onBeforeUnmount } from 'vue'

export function useModal(open, onClose) {
    const handleKeydown = (event) => {
        if (event.key === 'Escape' && open.value) {
            onClose()
        }
    }

    watch(
        open,
        (isOpen) => {
            if (typeof window === 'undefined') {
                return
            }

            document.body.classList.toggle(
                'overflow-hidden',
                isOpen,
            )

            if (isOpen) {
                window.addEventListener(
                    'keydown',
                    handleKeydown,
                )

                return
            }

            window.removeEventListener(
                'keydown',
                handleKeydown,
            )
        },
        {
            immediate: true,
        },
    )

    onBeforeUnmount(() => {
        if (typeof window === 'undefined') {
            return
        }

        window.removeEventListener(
            'keydown',
            handleKeydown,
        )

        document.body.classList.remove(
            'overflow-hidden',
        )
    })
}
