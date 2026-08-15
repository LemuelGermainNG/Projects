import type { NavigationGroup, NavigationItem } from '@/core/application/types'

type NavigationEntry = NavigationItem | NavigationGroup

export function normalizeNavigation(schema: {
  items?: NavigationEntry[]
  groups?: NavigationGroup[]
} | null | undefined): NavigationEntry[] {
  if (!schema) return []

  return [...(schema.items ?? []), ...(schema.groups ?? [])].filter((entry) => {
    return !('visible' in entry) || entry.visible !== false
  })
}

export function isNavigationGroup(entry: NavigationEntry): entry is NavigationGroup {
  return Array.isArray((entry as NavigationGroup).items)
}
