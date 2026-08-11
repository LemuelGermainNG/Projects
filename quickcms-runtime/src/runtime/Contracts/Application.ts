export interface ApiResponse<T> {
  data: T
}

export interface ApplicationMetadata {
  id: string
  name: string
  path: string
  layout: string
}

export interface HeaderSchema {
  type: 'header'
  title: string
  description: string
  icon: string | null
  props: unknown[]
}

export interface PageSchema {
  type: 'page'
  header: HeaderSchema | null
  content: ComponentSchema | null
  props: unknown[]
}

export interface ComponentSchema {
  type: string
  [key: string]: unknown
}

export interface ApplicationSchema {
  type: 'application'
  brand: unknown | null
  root: PageSchema | null
  navigation: unknown[]
  props: unknown[]
}

export interface ApplicationDocument {
  application: ApplicationMetadata
  schema: ApplicationSchema
}

export type ApplicationSchemaResponse =
  ApiResponse<ApplicationDocument>