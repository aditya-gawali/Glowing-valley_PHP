import create from 'zustand'
import api from '../services/api'

export const useProductStore = create((set) => ({
  products: [],
  loading: false,
  async fetchProducts(params = {}){
    set({ loading: true })
    try{
      // params: { popular: 1, category: 2, limit: 8 }
      const res = await api.get('/products', { params })
      set({ products: res.data })
      return res.data
    }catch(e){ console.error(e); return [] }
    finally{ set({ loading: false }) }
  },
  async getProductById(id){
    set({ loading: true })
    try{
      const res = await api.get(`/products/${id}`)
      return res.data
    }catch(e){ console.error(e); return null }
    finally{ set({ loading: false }) }
  },
  async searchProducts(q){
    set({ loading: true })
    try{
      const res = await api.get('/products', { params: { q } })
      return res.data
    }catch(e){ console.error(e); return [] }
    finally{ set({ loading: false }) }
  }
}))
