import type { ReactNode } from 'react'

export interface ApplicationMetadata {
  id: string
  name: string
  path: string
  layout?: string
}

export interface NavigationItem {
  label: string
  icon: string | null
  route: string | null
  url: string | null
  badge: string | number | null
  visible: boolean
  children: NavigationItem[]
  props: unknown[]
}

export interface NavigationGroup {
  type: 'navigation-group' | 'navigation'
  label: string
  icon: string | null
  items: NavigationItem[]
  props: unknown[]
}

export type NavigationEntry = NavigationItem | NavigationGroup

export interface ApplicationSchema {
  navigation: {
    items: NavigationEntry[]
  }
}

export interface ApplicationLayoutProps {
  application: ApplicationMetadata
  schema: ApplicationSchema
  children: ReactNode
}
