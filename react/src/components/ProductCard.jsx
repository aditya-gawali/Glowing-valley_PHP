import React from 'react'
import { Link } from 'react-router-dom'
import { useCartStore } from '../stores/cartStore'

export default function ProductCard({ product }){
  const add = useCartStore(s => s.add)
  return (
    <article className="product-card">
      <Link to={`/product/${product.id}`}>
        <img src={product.image || '/assets/react.svg'} alt={product.name} width={200} />
        <h3>{product.name}</h3>
      </Link>
      <div>${product.price}</div>
      <button onClick={() => add(product)}>Add</button>
    </article>
  )
}
