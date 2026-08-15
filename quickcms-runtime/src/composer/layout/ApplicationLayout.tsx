import type { ApplicationLayoutProps } from './LayoutRegistry'
import { SidebarLayout } from './SidebarLayout'

const layouts = {
  sidebar: SidebarLayout,
} as const

export function ApplicationLayout(props: ApplicationLayoutProps) {
  const layout = props.application.layout.trim().toLowerCase()
  const Layout = layouts[layout as keyof typeof layouts] ?? SidebarLayout

  return <Layout {...props} />
}
