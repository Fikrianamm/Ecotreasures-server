import { Link } from '@inertiajs/react'
import React from 'react'


export const EcoTreasures = ({type}) => {
  if (type == 1){
  return (
    <Link href={"/"}><h1 title='EcoTreasures' className='cursor-pointer font-breeSerif text-green-700 text-2xl' >EcoTreasures</h1></Link>
  )}else{
  return (
    <Link href={"/"}><h1 title='EcoTreasures' className='cursor-pointer font-breeSerif text-gray-50 text-2xl' >EcoTreasures</h1></Link>
  )}
}