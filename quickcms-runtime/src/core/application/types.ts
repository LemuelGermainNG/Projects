export interface ApplicationMetadata {
  id: string
  name: string
  path: string
  layout: string
  [key: string]: unknown
}

export interface NavigationItem {
  label: string
  icon?: string | null
  route?: string | null
  url?: string | null
  badge?: unknown
  visible?: boolean
  children?: NavigationItem[]
  props?: unknown
}

export interface NavigationGroup {
  type?: string
  id?: string | null
  label: string
  icon?: string | null
  items: NavigationItem[]
  props?: unknown
}

export interface ApplicationSchema {
  type: string
  brand?: unknown
  root: string | null
  navigation?: {
    type?: string
    items?: Array<NavigationItem | NavigationGroup>
    groups?: NavigationGroup[]
    props?: unknown
  } | null
  props?: unknown
}

export interface ApplicationSchemaResponse {
  data: { application: ApplicationMetadata; schema: ApplicationSchema }
}

export interface PageSchema {
  type: string
  header?: {
    type?: string
    title?: string | null
    description?: string | null
    icon?: string | null
    props?: unknown
  } | null
  content?: Record<string, unknown> | null
  props?: unknown
}

export interface PageResponse {
  data: {
    application: ApplicationMetadata
    route: string
    parameters: Record<string, string>
    page: PageSchema
  }
}
