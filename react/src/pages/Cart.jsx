import React from 'react'
import { useCartStore } from '../stores/cartStore'
import { Link } from 'react-router-dom'

export default function Cart(){
  const items = useCartStore(s => s.items)
  const remove = useCartStore(s => s.remove)
  const clear = useCartStore(s => s.clear)
  const total = useCartStore(s => s.total)()

  return (
    <div className="mx-auto flex max-w-3xl flex-col space-y-4 p-6 px-5 sm:p-10 sm:px-2">
      <h2 className="text-3xl font-bold">Your cart</h2>
      <p className="mt-3 text-sm font-medium text-gray-700">Review your items before checkout</p>
      <ul className="flex flex-col divide-y divide-gray-200">
        {items.length === 0 && <p className="py-4">Cart is empty</p>}
        {items.map((item, idx) => (
          <li className="flex flex-col py-6 sm:flex-row sm:justify-between" key={`${item.id}-${item.weight}`}>
            <div className="flex w-full space-x-2 sm:space-x-4">
              <img className="h-20 w-20 flex-shrink-0 rounded object-contain" src={item.image || '/assets/react.svg'} alt={item.name} />
              <div className="flex w-full flex-col justify-between pb-4">
                <div className="flex w-full justify-between space-x-2 pb-2">
                  <div className="space-y-1">
                    <h3 className="text-lg font-semibold leading-snug sm:pr-8">{item.name}</h3>
                    <p className="text-sm">Weight : {item.weight}</p>
                    <p className="text-sm">Quantity : {item.quantity}</p>
                  </div>
                  <div className="text-right">
                    <p className="text-lg font-semibold">₹ {item.price * item.quantity}</p>
                  </div>
                </div>
                <div className="flex divide-x text-sm">
                  <button type="button" onClick={() => remove(item.id, item.weight)} className="flex items-center space-x-2 px-2 py-1 pl-0">Remove</button>
                </div>
              </div>
            </div>
          </li>
        ))}
      </ul>

      <div className="space-y-1 text-right">
        <p>Total amount: <span className="font-semibold">₹ {total}</span></p>
      </div>

      <div className="flex justify-end space-x-4">
        <Link to="/shop"><button className="rounded-md border border-black px-3 py-2 text-sm font-semibold text-black">Back to shop</button></Link>
        <button className="rounded-md border border-black px-3 py-2 text-sm font-semibold text-black" onClick={() => alert('Checkout flow not implemented')}>Checkout</button>
      </div>
    </div>
  )
}
