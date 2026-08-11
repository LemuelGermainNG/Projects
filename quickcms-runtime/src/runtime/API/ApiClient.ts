export interface ApiClientOptions {
  baseUrl: string
  credentials?: RequestCredentials
}

export class ApiError extends Error {
  readonly status: number
  readonly body: unknown

  constructor(
    message: string,
    status: number,
    body: unknown = null,
  ) {
    super(message)

    this.name = 'ApiError'
    this.status = status
    this.body = body
  }
}

export class ApiClient {
  private readonly baseUrl: string
  private readonly credentials: RequestCredentials

  constructor(options: ApiClientOptions) {
    this.baseUrl = options.baseUrl.replace(/\/+$/, '')
    this.credentials = options.credentials ?? 'include'
  }

  async get<T>(
    path: string,
    signal?: AbortSignal,
  ): Promise<T> {
    return this.request<T>('GET', path, {
      signal,
    })
  }

  private async request<T>(
    method: string,
    path: string,
    options: RequestInit = {},
  ): Promise<T> {
    const response = await fetch(this.buildUrl(path), {
      ...options,
      method,
      credentials: this.credentials,
      headers: this.buildHeaders(options.headers),
    })

    const body = await this.parseBody(response)

    if (!response.ok) {
      const message =
        typeof body === 'object' &&
        body !== null &&
        'message' in body
          ? String(
              (body as { message: unknown }).message,
            )
          : `Request failed with status ${response.status}.`

      throw new ApiError(
        message,
        response.status,
        body,
      )
    }

    return body as T
  }

  private buildUrl(path: string): string {
    return `${this.baseUrl}/${path.replace(/^\/+/, '')}`
  }

  private buildHeaders(
    headers?: HeadersInit,
  ): Headers {
    const result = new Headers(headers)

    result.set(
      'Accept',
      'application/json',
    )

    return result
  }

  private async parseBody(
    response: Response,
  ): Promise<unknown> {
    const contentType =
      response.headers.get('content-type') ?? ''

    if (
      contentType.includes('application/json')
    ) {
      return response.json()
    }

    const text = await response.text()

    return text.length > 0 ? text : null
  }
}