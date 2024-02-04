import { Link } from '@inertiajs/react'
import React from 'react'


export const HrefButton = ({href, nama, classIcon, title}) => {
  return (
    <Link title={title} href={href} class="focus:outline-none text-gray-50 bg-green-700 hover:bg-green-800 font-medium rounded-md text-sm px-5 py-1.5">{nama}<i className={classIcon}></i></Link>
  )
};

export const HrefButtonOff = ({href, nama, classIcon}) => {
  return (
    <Link href={href} class="text-gray-50 border border-gray-50 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-md text-sm px-5 py-1.5">{nama}<i className={classIcon}></i></Link>
  )
};

export const CancelButton = ({href, color, classIcon}) => {
  function cancel() {
    history.back();
  };
  if(color === 1){
  return (
    <Link href={href} onClick={cancel} class="text-gray-50 border border-gray-50 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-md text-sm px-5 py-1.5">Cancel<i className={classIcon}></i></Link>
  )}else{
  return (
    <Link href={href} onClick={cancel} class="text-gray-800 border border-gray-800 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-md text-sm px-5 py-1.5">Cancel<i className={classIcon}></i></Link>
  )}
};
