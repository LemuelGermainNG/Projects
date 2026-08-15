import type { SchemaNode } from './schema'

export interface PageMetadata {
  [key: string]: unknown
}

export interface PageDocument {
  type: 'page' | string
  metadata: PageMetadata
  header: SchemaNode | null
  content: SchemaNode | null
  props: unknown[] | Record<string, unknown>
}

export interface PageResponseData {
  application: Record<string, unknown>
  route: string
  parameters: Record<string, string> | string[] | Record<string, unknown>
  page: PageDocument
}
