import React from 'react'

export default function Founder(){
  return (
    <div className="py-10 px-5 md:px-20 flex flex-col gap-4">
      <h1 className="text-center text-2xl md:text-3xl font-bold py-4 capitalize">Word from Founder</h1>
      <div className="grid grid-flow-row grid-cols-1 md:grid-cols-3 gap-4">
        <div className="flex flex-col gap-4">
          <img src="/assets/images/founder1.jpg" alt="Founder" className="w-full md:h-[70vh] object-cover rounded-lg" />
          <h1 className="text-2xl font-extrabold text-center">Ashwini Ashish Patil.</h1>
        </div>
        <div className="flex flex-col gap-4 px-0 md:px-2 items-center justify-center md:col-span-2">
          <h1 className="text-xl text-center">My self Ashwini Ashish Patil. Since from my childhood I dreamt & was very fond of doing something really different which I further carried out through my career. Professionally I am an interior designer and decorater and cosmetic products formulator.</h1>
          <h1 className="hidden md:block text-xl text-center">Organic cosmetic product was the field which really attracted me towards its business. Where Indian made things & goods should be used more and more in order to raise country name into the business.</h1>
        </div>
      </div>
    </div>
  )
}
