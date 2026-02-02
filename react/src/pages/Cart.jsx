import React from 'react'
import { useCartStore } from '../stores/cartStore'
import CartItem from '../components/CartItem'

export default function Cart(){
  const { items, clear } = useCartStore()
  return (
    <section>
      <h1>Your Cart</h1>
      <div>
        {items.length === 0 ? <p>Cart is empty</p> : items.map(i => <CartItem key={i.id} item={i} />)}
      </div>
      {items.length > 0 && <button onClick={clear}>Clear cart</button>}
    </section>
  )
}
