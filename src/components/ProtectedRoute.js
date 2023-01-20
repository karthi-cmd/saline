import React from "react";
import { Outlet, Navigate } from "react-router-dom";

const ProtectedRoute = ({auth}) => {
    // let auths={'token':false}
    return  auth ?< Outlet />:< Navigate to='/login'/> 
}
export default ProtectedRoute;