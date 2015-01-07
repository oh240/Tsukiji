
# Example

```php

<?php

    use \Tsukiji\libs\controller;
    use \Tsukiji\libs\util;
    use \Tsukiji\models\Users;

    /**
     * Class userscontroller
     */
    class userscontroller extends controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->Users = new Users;
        }

        public function index()
        {
            $users = $this->Users->all();
            if (!$users){
                $this->statusCode = 201;
            }
            $this->jsonSet($users,"OK");
        }

        public function show()
        {
            $id = $this->params['id'];

            $user = $this->Users->find($id);
            if (empty($user)){
                $this->statusCode = 201;
            }
            $this->jsonSet($user,"OK");
        }

        public function create()
        {
            $params = $this->receiveData;

            $result = $this->Users->create([
              'name' => $params['name'],
              'password' => $params['password'],
            ]);

            if ($result){
                $result = "Saved";
                $this->statusCode = 201;
            } else {
                $result = "Error!";
                $this->statusCode = 500;
            }

            $this->jsonSet(null,$result);
        }

        public function update()
        {
          $params = $this->reciveData;

          $user = $this->Users->find($params['id']);

          $user->update([
              'name' => $params['name'],
              'password' => $params['password'],
          ]);

          if ($this->Users->save($params)){
            $result = "Saved";
            $this->statusCode = 201;
          } else {
            $result = "Error!";
            $this->statusCode = 500;
          }
        }

        public function delete()
        {

        }
    }
```
