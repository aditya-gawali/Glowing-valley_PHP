import create from 'zustand'

export const useCartStore = create((set) => ({
  items: [],
  add: (product) => set((s) => {
    // simple add, ensure unique id
    if (s.items.find(i => i.id === product.id)) return s
    return { items: [...s.items, product] }
  }),
  remove: (id) => set((s) => ({ items: s.items.filter(i => i.id !== id) })),
  clear: () => set({ items: [] })
}))
