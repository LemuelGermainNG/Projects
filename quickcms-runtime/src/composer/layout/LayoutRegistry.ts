import type { ReactNode } from 'react'
import type { ApplicationMetadata, ApplicationSchema, PageSchema } from '@/core/application/types'
import type { ResolvedRoute, RouteResolver } from '@/runtime/navigation/RouteResolver'

export interface ApplicationLayoutProps {
  application: ApplicationMetadata
  schema: ApplicationSchema
  route: ResolvedRoute
  routeResolver: RouteResolver
  page: PageSchema | null
  children: ReactNode
}

export type ApplicationLayoutComponent = (
  props: ApplicationLayoutProps,
) => ReactNode
