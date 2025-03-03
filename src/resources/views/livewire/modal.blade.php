<div>
    <button wire:click="openModal()" type="button">詳細</button>
    @if($showModal)
    <div class="modal">
        <div class="modal__inner">
            <button wire:click="closeModal()" type="button" class="modal-button__close">×</button>
            <table class="modal-table">
                <tr class="modal-table__row">
                    <th class="modal-table__header">お名前</th>
                    <td class="modal-table__item">&nbsp;&nbsp;</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">性別</th>
                    <td class="modal-table__item">
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">メールアドレス</th>
                    <td class="modal-table__item"></td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">電話番号</th>
                    <td class="modal-table__item">
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">住所</th>
                    <td class="modal-table__item"></td>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">建物名</th>
                    <td class="modal-table__item"></td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせの種類</th>
                    <td class="modal-table__item"></td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせあ内容</th>
                    <td class="modal-table__item"></td>
                </tr>
            </table>
            <form class="delete-form" action="/delete" method="post">
            @method('delete')
            @csrf
                <input type="hidden" name="id" value="">
                <button class="delete__button">削除</button>
            </form>
        </div>
    @endif
    </div>
</div>