import create from 'zustand'
import api from '../services/api'

export const useProductStore = create((set) => ({
  products: [],
  loading: false,
  fetchProducts: async () => {
    set({ loading: true })
    try{
      const res = await api.get('/products')
      set({ products: res.data })
    }catch(e){ console.error(e) }
    set({ loading: false })
  }
}))
