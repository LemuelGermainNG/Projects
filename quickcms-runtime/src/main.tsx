import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import '@/styles/globals.css'
import { AppProvider } from '@/app/providers/AppProvider'
import { bootstrap } from '@/app/bootstrap'
import App from './App'


const { queryClient, runtime } = bootstrap()

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <AppProvider queryClient={queryClient} runtime={runtime}>
      <App />
    </AppProvider>
  </StrictMode>,
)
