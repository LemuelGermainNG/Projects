import type { ReactNode } from 'react'

export type ApplicationLayoutType =
  | 'sidebar'
  | 'top-navigation'
  | 'simple'
  | 'default'
  | (string & {})

export interface NavigationItem {
  label: string
  icon?: string | null
  route?: string | null
  url?: string | null
  badge?: string | number | null
  visible?: boolean
  children?: NavigationItem[]
  props?: unknown[] | Record<string, unknown>
}

export interface NavigationGroup {
  label?: string | null
  items: NavigationItem[]
}

export interface ApplicationNavigation {
  items?: NavigationItem[]
  groups?: NavigationGroup[]
  [key: string]: unknown
}

export interface ApplicationLayoutContext {
  name?: string
  title?: string
  path?: string
  brand?: string | null
  logo?: string | null
  layout?: ApplicationLayoutType | { type?: ApplicationLayoutType; [key: string]: unknown }
  navigation?: NavigationItem[] | ApplicationNavigation | null
}

export interface ApplicationLayoutProps {
  application: ApplicationLayoutContext
  currentPath: string
  children: ReactNode
  onNavigate?: (target: string) => void
}
