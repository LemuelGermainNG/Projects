import type { ApiClient } from '@/core/api/ApiClient'
import type { ApplicationSchemaResponse, PageResponse } from './types'

export class ApplicationApi {
  constructor(
    private readonly client: ApiClient,
    public readonly application: string,
  ) {}

  getSchema(): Promise<ApplicationSchemaResponse> {
    return this.client.get(`/applications/${encodeURIComponent(this.application)}/schema`)
  }

  getPage(route: string): Promise<PageResponse> {
    const encodedRoute = route.split('/').map((segment) => encodeURIComponent(segment)).join('/')
    return this.client.get(
      `/applications/${encodeURIComponent(this.application)}/pages/${encodedRoute}`,
    )
  }
}
