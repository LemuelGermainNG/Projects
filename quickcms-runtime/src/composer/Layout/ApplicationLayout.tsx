import type { ReactNode } from 'react'

import type {
  ApplicationMetadata,
  ApplicationSchema,
} from '@/runtime/Contracts/Application'

import {
  resolveApplicationLayout,
} from './LayoutRegistry'

import { SidebarLayout } from './SidebarLayout'

export interface ApplicationLayoutProps {
  application: ApplicationMetadata
  schema: ApplicationSchema
  children: ReactNode
}

export function ApplicationLayout({
  application,
  schema,
  children,
}: ApplicationLayoutProps) {
  const layout = resolveApplicationLayout(
    application.layout,
  )

  switch (layout) {
    case 'sidebar':
      return (
        <SidebarLayout
          application={application}
          schema={schema}
        >
          {children}
        </SidebarLayout>
      )

    case 'top-navigation':
      /*
       * TopNavigationLayout will be added once
       * the navigation contract is implemented.
       */
      return (
        <div className="min-h-screen">
          {children}
        </div>
      )

    case 'simple':
      return (
        <div className="min-h-screen">
          {children}
        </div>
      )
  }
}