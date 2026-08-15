import { ApplicationLayout } from './ApplicationLayout'
import { LayoutRegistry, layoutRegistry } from './LayoutRegistry'
import { SidebarLayout } from './SidebarLayout'
import { SimpleLayout } from './SimpleLayout'
import { TopNavigationLayout } from './TopNavigationLayout'

layoutRegistry.registerMany({
  sidebar: SidebarLayout,
  default: SidebarLayout,
  'top-navigation': TopNavigationLayout,
  simple: SimpleLayout,
})

export {
  ApplicationLayout,
  LayoutRegistry,
  SidebarLayout,
  SimpleLayout,
  TopNavigationLayout,
  layoutRegistry,
}
