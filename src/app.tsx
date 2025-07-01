import { createRoot } from 'react-dom/client'
import { createInertiaApp } from '@inertiajs/inertia-react'
import "./globals.css"
createInertiaApp({
  resolve: (name: string) => {
    // @ts-ignore
    const pages = import.meta.glob('./Pages/**/*.tsx')
    return pages[`./Pages/${name}.tsx`]()
  },
  setup({ el, App, props }) {
    const root = createRoot(el)
    root.render(<App {...props} />)
  },
})
