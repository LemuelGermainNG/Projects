import { ApiClient } from '@/runtime/API/ApiClient'
import { ApplicationApi } from '@/runtime/API/ApplicationApi'
import { Runtime } from '@/runtime/Runtime'
import { apiConfig, appConfig } from '@/app/config'

export function createRuntime() {
  const client = new ApiClient({
    baseUrl: apiConfig.baseUrl,
  })

  const applicationApi = new ApplicationApi(client)

  return new Runtime({
    application: appConfig.application,
    applicationApi,
  })
}
