import { create } from 'zustand'
import { persist, createJSONStorage } from 'zustand/middleware'

export const useTokenStore = create(
  persist(
    (set, get) => ({
      token: "sus",
      clearToken: () => set({ token: "sus" }),
    }),
    {
      name: 'job-seekers-token', // name of the item in the storage (must be unique)
      storage: createJSONStorage(() => sessionStorage), // (optional) by default, 'localStorage' is used
    }
  )
)
