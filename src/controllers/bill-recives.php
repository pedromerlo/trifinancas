<?php
use Psr\Http\Message\ServerRequestInterface;


$app
    ->get('/bill-recives', function () use($app){

        $view = $app->service('view.renderer');
        $repository = $app->service('bill-recives.repository');
        $auth= $app->service('auth');
        $bills = $repository->findByField('user_id',$auth->user()->getId());
        return $view->render('bill-recives/list.html.twig',[
            'bills'=> $bills
        ]);

    },'bill-recives.list')

    ->get('/bill-recives/new', function () use($app){
        $view = $app->service('view.renderer');
        return $view->render('bill-recives/create.html.twig');

    },'bill-recives.new')

    ->post('/bill-recive/store', function (ServerRequestInterface $request) use($app){
        // cadastro de categorias
        $repository = $app->service('bill-recives.repository');
        $data = $request->getParsedBody();

        $data['date_launch'] = dateParse($data['date_launch']);
        $data['value'] = numberParse($data['value']);

        $auth= $app->service('auth');
        $data['user_id']= $auth->user()->getId();

        $repository->create($data);
        return $app->route('bill-recives.list');

    },'bill-recives.store')

    ->get('/bill-recives/{id}/edit', function (ServerRequestInterface $request)use($app ){

        $view = $app->service('view.renderer');
        $repository = $app->service('bill-recives.repository');
        $id=$request->getAttribute('id');
        $auth= $app->service('auth');
        $bill = $repository->findOneBy([
            'id' => $id,
            'user_id' => $auth->user()->getId()
        ]);

        return $view->render('bill-recives/edit.html.twig',['bill'=>$bill]);
    },'bill-recives.edit')

    ->post('/bill-recives/{id}/update', function (ServerRequestInterface $request)use($app){
        $id=$request->getAttribute('id');
        $data = $request->getParsedBody();
        $data['date_launch']=dateParse($data['date_launch']);
        $data['value']=numberParse($data['value']);
        $auth= $app->service('auth');
        $data['user_id']= $auth->user()->getId();
        $repository = $app->service('bill-recives.repository');
        $repository->update([
                'id'=> $id,
                'user_id'=> $auth->user()->getId()
            ],$data);
        return $app->route('bill-recives.list');
    },'bill-recives.update')

    ->get('/bill-recives/{id}/show', function (ServerRequestInterface $request)use($app ){
        $view = $app->service('view.renderer');
        $repository = $app->service('bill-recives.repository');
        $id = $request->getAttribute('id');
        $auth= $app->service('auth');
        $bill = $repository->findOneBy([
            'id' => $id,
            'user_id' => $auth->user()->getId()
        ]);
        return $view->render('bill-recives/show.html.twig',['bill'=>$bill]);
    },'bill-recives.show')

    ->get('/bill-recives/{id}/delete', function (ServerRequestInterface $request)use($app ){
        $id= $request->getAttribute('id');
        $repository = $app->service('bill-recives.repository');
        $auth= $app->service('auth');
        $repository->delete([
            'id' => $id,
            'user_id' => $auth->user()->getId()
        ]);
        return $app->route( 'bill-recives.list');
    },'bill-recives.delete');