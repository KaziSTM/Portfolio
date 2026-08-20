import { usePage } from '@inertiajs/vue3'

export default function useGetTitle(page) {
    const pageProps = usePage()

    return pageProps.props.pages[page]
}
