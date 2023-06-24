import '@/styles/globals.css'
import { Hydrate, QueryClient, QueryClientProvider } from '@tanstack/react-query';
import Head from 'next/head'
import { useState } from 'react';

export default function App({ Component, pageProps }) {
  const [queryClient] = useState(() => new QueryClient())
  return (
    <QueryClientProvider client={queryClient}>
      <Hydrate state={pageProps.dehydratedState}>
        <Component  {...pageProps} />
      </Hydrate>
    </QueryClientProvider>
  )
}
