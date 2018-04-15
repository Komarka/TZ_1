
@if(Auth::check())
 <button type="button" class="btn btn-info"  id="showComment" aria-haspopup="true" aria-expanded="false">Оставить комментарий</button>
 	<form class="form-group" id="comment_form" method="POST" action={{ $is_polytical===true  ? route('checkout') : route('comments')}} hidden>
  <label for="comment">Напишите ваш комментарий:</label>
  <input  name="user_id"  id='user_id' type="hidden" value={{ Auth::id() }}>
<input  name="news_id" type="hidden" id='news_id' value={{ $article->id }}>
  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
   <button type="submit"  id='send' class="btn btn-primary">
                                Отправить
                                </button>
                            </form>

<form class="form-group" id="respond_form" method="POST" action={{ $is_polytical===true  ? route('checkout') : route('respond')}} hidden>
  <label for="comment">Напишите ваш ответ:</label>
  <input  name="user_id"  id='user_id' type="hidden" value={{ Auth::id() }}>
<input  name="news_id" type="hidden" id='news_id' value={{ $article->id }}>
  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
   <button type="submit"  id='send' class="btn btn-primary">
                                Ответить
                                </button>
                            </form>

@endif