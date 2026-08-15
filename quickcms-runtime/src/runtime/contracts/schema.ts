export interface SchemaNode {
  type: string
  [key: string]: unknown
}

export type SchemaRendererProps<TSchema extends SchemaNode = SchemaNode> = {
  schema: TSchema
}
