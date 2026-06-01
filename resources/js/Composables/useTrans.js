import { usePage } from '@inertiajs/vue3'

export function useTrans(key, replacements = {}) {
    const page = usePage()

    let value = key.split('.').reduce((obj, segment) => obj?.[segment], page.props.translations)

    Object.entries(replacements).forEach(([placeholder, replacement]) => {
        value = value.replace(`:${placeholder}`, replacement)
    })

    return value
}
