<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\Model\Admin\Post;
// use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    protected function getPermission($admin,$p_id)
    {
       foreach ($admin->roles as $role) {
           foreach ($role->permissions as $permission) {
               if ($permission->id == $p_id) {
                   return true;
               }
           }
       }
       return false;
    }

     // Partie pour les authorisation des codifications
     public function codifier_index(Admin $admin)
     {
         return $this->getPermission($admin,1);
     }
 
     public function codifier_create(Admin $admin)
     {
         return $this->getPermission($admin,2);
     }
 
     public function codifier_update(Admin $admin)
     {
         return $this->getPermission($admin,3);
     }
 
     public function codifier_delete(Admin $admin)
     {
         return $this->getPermission($admin,4);
     }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        return $this->getPermission($admin,5);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */

    


    public function create(Admin $admin)
    {
        return $this->getPermission($admin,6);
    }



    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->getPermission($admin,7);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        return $this->getPermission($admin,8);
    }


    // Partie des authorisation pour les logements

    public function logement_index(Admin $admin)
    {
        return $this->getPermission($admin,9);
    }

    public function logement_create(Admin $admin)
    {
        return $this->getPermission($admin,10);
    }

    public function logement_update(Admin $admin)
    {
        return $this->getPermission($admin,11);
    }

    public function logement_delete(Admin $admin)
    {
        return $this->getPermission($admin,12);
    }
    

    //Partie pour les authorisation administration 
    public function admin_index(Admin $admin)
    {
        return $this->getPermission($admin,13);
    }

    public function admin_create(Admin $admin)
    {
        return $this->getPermission($admin,14);
    }

    public function admin_update(Admin $admin)
    {
        return $this->getPermission($admin,15);
    }

    public function admin_delete(Admin $admin)
    {
        return $this->getPermission($admin,16);
    }

   


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Admin $admin)
    {
        //
    }
}
