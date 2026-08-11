import type { ComponentType, ReactNode } from 'react'

import type {
  ApplicationMetadata,
  ApplicationSchema,
} from '@/runtime/Contracts/Application'

export type ApplicationLayoutType =
  | 'sidebar'
  | 'top-navigation'
  | 'simple'

export interface ApplicationLayoutProps {
  application: ApplicationMetadata
  schema: ApplicationSchema
  children: ReactNode
}

export type ApplicationLayoutComponent =
  ComponentType<ApplicationLayoutProps>

export function resolveApplicationLayout(
  layout: string,
): ApplicationLayoutType {
  switch (layout) {
    case 'sidebar':
      return 'sidebar'

    case 'top-navigation':
      return 'top-navigation'

    case 'simple':
      return 'simple'
      
    default:
      return 'sidebar'
  }
}