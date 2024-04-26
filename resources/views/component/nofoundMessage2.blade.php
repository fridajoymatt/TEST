<div class="body" >
		
    <div class="nofound">
        <div class="empty-state">
         <div class="empty-state__content">
           <div class="empty-state__icon">
             <img src="{{ asset('images/no result.png') }}" alt="">
           </div>
           <div class="empty-state__message">Aucun résultat</div>
           <div class="empty-state__help">
           </div>
         </div>
        </div>
        
        </div>
        <style>
        
        .body {
        background: #ebedf2;
        font-family: "Poppins", sans-serif;
        }
        .empty-state {
        width: 750px;
        margin: 40px auto;
        background: #ffffff;
        box-shadow: 1px 2px 10px #e1e3ec;
        border-radius: 4px;
        }
        .empty-state__content {
        padding: 48px;
        display: flex;
        align-items: center;
        flex-direction: column;
        }
        .empty-state__content .empty-state__icon {
        width: 200px;
        height: 200px;
        display: flex;
        align-items: center;
        border-radius: 200px;
        justify-content: center;
        background-color: #f7fafc;
        box-shadow: 0px 2px 1px #e1e3ec;
        }
        .empty-state__content .empty-state__icon img {
        width: 170px;
        }
        .empty-state__content .empty-state__message {
        color: #d28d2e;
        font-size: 1.5rem;
        font-weight: 500;
        margin-top: 0.85rem;
        }
        .empty-state__content .empty-state__help {
        color: #a2a5b9;
        font-size: 0.875rem;
        }
        .credit {
        color: #A2A5B9;
        font-size: 0.75rem;
        text-align: center;
        }
        .credit a {
        color: #444;
        }
        
        </style>
        
        </div>