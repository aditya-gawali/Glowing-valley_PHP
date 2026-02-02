import React from 'react'
import { useCartStore } from '../stores/cartStore'

export default function CartItem({ item }){
  const remove = useCartStore(s => s.remove)
  return (
    <div className="cart-item">
      <img src={item.image || '/assets/react.svg'} alt={item.name} width={60} />
      <div>{item.name}</div>
      <div>${item.price}</div>
      <button onClick={() => remove(item.id)}>Remove</button>
    </div>
  )
}
