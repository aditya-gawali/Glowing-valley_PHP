import create from 'zustand'

export const useCartStore = create((set, get) => ({
  // items: { id, quantity, weight, price, name, image }
  items: [],
  add: (item) => set((s) => {
    // item { id, weight, price, name, image }
    const exists = s.items.find(i => i.id === item.id && i.weight === item.weight)
    if (exists) {
      return { items: s.items.map(i => i.id === item.id && i.weight === item.weight ? { ...i, quantity: i.quantity + 1 } : i) }
    }
    return { items: [...s.items, { ...item, quantity: 1 }] }
  }),
  remove: (id, weight) => set((s) => ({ items: s.items.filter(i => !(i.id === id && i.weight === weight)) })),
  removeByIndex: (index) => set((s) => ({ items: s.items.filter((_, idx) => idx !== index) })),
  updateQuantity: (id, weight, quantity) => set((s) => ({ items: s.items.map(i => (i.id === id && i.weight === weight) ? { ...i, quantity } : i) })),
  clear: () => set({ items: [] }),
  total: () => get().items.reduce((acc, i) => acc + (i.price * i.quantity), 0)
}))
